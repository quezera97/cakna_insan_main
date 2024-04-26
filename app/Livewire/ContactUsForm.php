<?php

namespace App\Livewire;

use App\Models\ContactUs;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
class ContactUsForm extends Component
{
    public $name;
    public $email;
    public $organization;
    public $message;

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

    protected $rules = [
        'name' => 'required|string|min:6',
        'email' => 'required|string|email',
        'organization' => 'string|min:6',
        'message' => 'string|max:500',
    ];

    public function render()
    {
        return view('livewire.forms.contact-us');
    }

    public function save()
    {
        $this->modalTitle = 'Berjaya!';
        $this->modalDescription = 'Mesej anda telah kami simpan';

        $validatedData = $this->validate([
            'name' => 'required|string|min:6',
            'email' => 'required|string|email',
            'organization' => 'string|min:6',
            'message' => 'string|max:500',
        ]);

        try {
            DB::beginTransaction();

            ContactUs::create([
                'name' => $this->pull('name'),
                'email' => $this->pull('email'),
                'organization' => $this->pull('organization'),
                'message' => $this->pull('message'),
            ]);

            DB::commit();

            $this->openModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
