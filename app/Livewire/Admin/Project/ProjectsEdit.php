<?php

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectsEdit extends Component
{
    public $selectedProject;

    public function mount(Project $project)
    {
        $this->selectedProject = $project;
    }

    public function render()
    {
        return view('livewire.admin.project.projects-edit');
    }
}
