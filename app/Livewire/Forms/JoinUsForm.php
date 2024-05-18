<?php

namespace App\Livewire\Forms;

use App\Models\JoinUs;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
class JoinUsForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $help_needed = [];
    public $expertise;

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
        return view('livewire.forms.join-us');
    }

    public function save()
    {
        $this->alertModalType = 'success';
        $this->alertModalDescription = 'Your participation has been recorded, we will contact you via email/WhatsApp.';

        $this->validate([
            'name' => 'required|string|min:6',
            'email' => 'required|string|email',
            'phone' => 'string|min:6',
            'help_needed' => 'nullable',
            'expertise' => 'string|max:500',
        ],[],[
            'name' => __('ui_text.name'),
            'email' => __('ui_text.email'),
            'phone' => __('ui_text.phone_no'),
            'help_needed' => __('ui_text.help_needed'),
            'expertise' => __('ui_text.expertise'),
        ]);

        $this->help_needed = json_encode($this->help_needed);

        try {
            DB::beginTransaction();

            JoinUs::create([
                'name' => $this->pull('name'),
                'email' => $this->pull('email'),
                'phone' => $this->pull('phone'),
                'help_needed' => $this->pull('help_needed'),
                'expertise' => $this->pull('expertise'),
            ]);

            DB::commit();

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
