<?php

namespace App\Livewire\Home;

use App\Models\PastProject;
use App\Models\Project;
use Livewire\Component;

class PastProjects extends Component
{
    public $pastProjects;
    public $pastRandomProjects;

    protected $listeners = ['getPastRandomProjects'];

    public function mount()
    {
        $this->getPastProjects();
    }

    public function getPastProjects()
    {
        $this->pastProjects = Project::with('projectable')->where('projectable_type', PastProject::class)->get();

        $this->getPastRandomProjects();
    }

    public function getPastRandomProjects()
    {
        $this->pastRandomProjects = $this->pastProjects->shuffle()->take(4);
    }

    public function render()
    {
        return view('livewire.home.past-projects');
    }
}
