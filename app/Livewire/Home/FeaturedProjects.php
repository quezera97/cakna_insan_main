<?php

namespace App\Livewire\Home;

use App\Models\Project;
use Livewire\Component;

class FeaturedProjects extends Component
{
    public $featuredProject;
    public $currentProjectIndex;

    protected $listeners = ['changeProjectIndex'];

    public function mount()
    {
        $this->getFeaturedProjects();
        $this->currentProjectIndex = 0;
    }

    public function getFeaturedProjects()
    {
        $this->featuredProject = Project::with('projectable')->where('has_passed', false)->where('is_featured', true)->inRandomOrder()->get();
    }

    public function render()
    {
        return view('livewire.home.featured-project');
    }

    public function changeProjectIndex()
    {
        if (count($this->featuredProject) > 0) {
            $this->currentProjectIndex = ($this->currentProjectIndex + 1) % count($this->featuredProject);
        }
    }
}

