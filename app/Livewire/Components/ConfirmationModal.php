<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ConfirmationModal extends Component
{
    public $confirmationModalTitle;

    public function render()
    {
        return view('livewire.components.confirmation-modal');
    }
}
