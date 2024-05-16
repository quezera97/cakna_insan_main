<?php

namespace App\Livewire\Home;

use App\Models\NewsDetail;
use Livewire\Component;

class NewsLetter extends Component
{
    public $newsDetail;

    public function render()
    {
        $this->newsDetail = NewsDetail::orderBy('date', 'desc')->limit(4)->get();

        return view('livewire.home.news-letter');
    }
}
