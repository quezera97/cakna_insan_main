<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AlertModal extends Component
{
    public $showModal = false;

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
        return view('livewire.components.alert-modal');
    }
}
