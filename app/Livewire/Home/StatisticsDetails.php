<?php

namespace App\Livewire\Home;

use App\Models\Statistic;
use Livewire\Component;

class StatisticsDetails extends Component
{
    public $statistics;

    public function mount()
    {
        $this->statistics = Statistic::first();
    }

    public function render()
    {
        return view('livewire.home.statistics-details');
    }
}
