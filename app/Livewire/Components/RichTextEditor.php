<?php

namespace App\Livewire\Components;

use Livewire\Component;

class RichTextEditor extends Component
{
    public $wireModel;

    public function mount($wireModel)
    {
        $this->wireModel = $wireModel;
    }

    public function render()
    {
        return view('livewire.components.rich-text-editor');
    }
}
