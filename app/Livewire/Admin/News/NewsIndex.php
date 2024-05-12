<?php

namespace App\Livewire\Admin\News;

use App\Models\NewsDetail;
use Livewire\Component;

class NewsIndex extends Component
{
    public $newsDetails = [];

    public function mount()
    {
        $this->newsDetails = NewsDetail::get();
    }

    public function render()
    {
        return view('livewire.admin.news.news-index');
    }

    public function addNews()
    {
        return redirect()->route('news.add');
    }

    public function editNews(NewsDetail $newsDetail)
    {
        return redirect()->route('news.edit', [$newsDetail]);
    }

    public function editNewsImages(NewsDetail $newsDetail)
    {
        return redirect()->route('news.edit-images', $newsDetail);
    }
}
