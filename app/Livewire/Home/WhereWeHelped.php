<?php

namespace App\Livewire\Home;

use App\Models\LocationCoordinate;
use Livewire\Component;

class WhereWeHelped extends Component
{
    public $locationCoordinate;

    public function mount()
    {
        $this->locationCoordinate = LocationCoordinate::get()->toArray();
    }

    public function render()
    {
        return view('livewire.home.where-we-helped');
    }
}
