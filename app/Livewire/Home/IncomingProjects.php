<?php

namespace App\Livewire\Home;

use App\Models\IncomingProject;
use App\Models\Project;
use Livewire\Component;

class IncomingProjects extends Component
{
    public $incomingProjects;
    public $incomingRandomProjects;

    protected $listeners = ['getIncomingRandomProjects'];

    public function mount()
    {
        $this->getIncomingProjects();
    }

    public function getIncomingProjects()
    {
        $this->incomingProjects = Project::with('projectable')->where('projectable_type', IncomingProject::class)->get();

        $this->getIncomingRandomProjects();
    }

    public function getIncomingRandomProjects()
    {
        $this->incomingRandomProjects = $this->incomingProjects->shuffle()->take(3);
    }

    public function render()
    {
        return view('livewire.home.incoming-project');
    }
}
