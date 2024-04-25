<?php

namespace App\Livewire;

use App\Models\JoinUs;
use Livewire\Component;

class JoinUsForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $help_needed = [];
    public $expertise;

    public $showModal = false;

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
        'phone' => 'string|min:6',
        'help_needed' => 'nullable',
        'expertise' => 'string|max:500',
    ];

    public function render()
    {
        return view('livewire.forms.join-us');
    }

    public function save()
    {
        // $this->validate();

        // $this->help_needed = json_encode($this->help_needed);

        // try {
        //     DB::beginTransaction();

        //     JoinUs::create([
        //         'name' => $this->pull('name'),
        //         'email' => $this->pull('email'),
        //         'phone' => $this->pull('phone'),
        //         'help_needed' => $this->pull('help_needed'),
        //         'expertise' => $this->pull('expertise'),
        //     ]);

        //     DB::commit();



        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     throw $th;
        // }
    }
}
