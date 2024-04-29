<?php

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectsTable extends Component
{
    public $listOfProjects;

    public function mount($projects)
    {
        $this->listOfProjects = $projects;
    }

    public function editProject(Project $project)
    {
        return redirect()->route('project.edit', ['project' => $project]);
    }

    public function addProject()
    {
        return redirect()->route('project.add');
    }

    public function render()
    {
        return view('livewire.admin.project.projects-table');
    }
}
