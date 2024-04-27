<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
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
        $this->modalTitle = 'Gagal!';
        $this->modalDescription = 'Maklumat yang anda guna adalah salah';

        $validatedData = $this->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        try {
            $password = User::where('email', $validatedData['email'])->value('password');

            if(Hash::check($validatedData['password'], $password)){
                return redirect('/');
            }
            else{
                $this->reset('password');

                $this->openModal();
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
