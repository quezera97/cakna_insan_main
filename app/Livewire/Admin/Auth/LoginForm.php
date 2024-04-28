<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;

    public $showModal = false;

    public $modalTitle = '';
    public $modalDescription = '';


    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.admin.auth.login-form');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('/dashboard');
        }
        else{
            $this->modalTitle = 'Gagal!';
            $this->modalDescription = 'Maklumat yang anda guna adalah salah';

            $this->reset(['password', 'email']);

            $this->openModal();
        }
    }
}
