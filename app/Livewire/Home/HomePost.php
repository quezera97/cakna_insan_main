<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class HomePost extends Component
{
    public $featuredPost;

    public function mount()
    {
        $this->featuredPost = Post::where('featured', true)->first();
    }

    public function render()
    {
        return view('livewire.home.home-post');
    }
}
