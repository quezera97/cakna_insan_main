<?php

namespace App\Livewire;

use App\Models\ContactUs;
use Livewire\Component;

class ContactUsForm extends Component
{
    public $name;
    public $email;
    public $organization;
    public $message;

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
        $this->validate();

        try {
            DB::beginTransaction();

            ContactUs::create([
                'name' => $this->pull('name'),
                'email' => $this->pull('email'),
                'organization' => $this->pull('organization'),
                'message' => $this->pull('message'),
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
