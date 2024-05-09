<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AlertModal extends Component
{
    public $alertModalType;
    public $alertModalDescription;

    public function render()
    {
        return view('livewire.components.alert-modal');
    }
}
