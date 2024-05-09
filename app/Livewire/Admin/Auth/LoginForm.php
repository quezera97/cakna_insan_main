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

    public $showAlertModal = false;

    public $alertModalType = '';
    public $alertModalDescription = '';


    public function openAlertModal()
    {
        $this->showAlertModal = true;
    }

    public function closeAlertModal()
    {
        $this->showAlertModal = false;
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
            $this->alertModalType = 'error';
            $this->alertModalDescription = 'Maklumat yang anda guna adalah salah';

            $this->reset(['password', 'email']);

            $this->openAlertModal();
        }
    }
}
