<?php

namespace App\Livewire;

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
        return view('livewire.forms.join-us');
    }

    public function save()
    {
        $this->modalTitle = 'Berjaya!';
        $this->modalDescription = 'Penyertaan anda telah direkodkan, kami akan menghubungi anda melalui emel/whatsapp';

        $validatedData = $this->validate([
            'name' => 'required|string|min:6',
            'email' => 'required|string|email',
            'phone' => 'string|min:6',
            'help_needed' => 'nullable',
            'expertise' => 'string|max:500',
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

            $this->openModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
