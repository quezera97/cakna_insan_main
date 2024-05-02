<?php

namespace App\Livewire\Forms;

use App\Models\ContactUs;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ContactUsForm extends Component
{
    public $name;
    public $email;
    public $organization;
    public $message;

    public $showAlertModal = false;

    public $alertModalTitle = '';
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
        return view('livewire.forms.contact-us');
    }

    public function save()
    {
        $this->alertModalTitle = 'Success!';
        $this->alertModalDescription = 'Your message has been saved';

        $this->validate([
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

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
