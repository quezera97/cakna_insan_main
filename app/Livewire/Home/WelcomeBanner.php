<?php

namespace App\Livewire\Home;

use App\Models\BannerJumbotron;
use Livewire\Component;

class WelcomeBanner extends Component
{
    public $bannerJumbotrons;

    public function mount()
    {
        $this->bannerJumbotrons = BannerJumbotron::where('is_featured', true)->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.home.welcome-banner');
    }
}
