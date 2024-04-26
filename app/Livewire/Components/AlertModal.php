<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AlertModal extends Component
{
    public $modalTitle;
    public $modalDescription;

    public function render()
    {
        return view('livewire.components.alert-modal');
    }
}
