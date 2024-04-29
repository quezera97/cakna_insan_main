<?php

namespace App\Livewire\Admin\Project;

use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectsEdit extends Component
{
    use WithFileUploads;

    public $selectedProject;
    public $typeOfProject;
    public $pastProject = PastProject::class;
    public $incomingProject = IncomingProject::class;

    public $title;
    public $subtitle;
    public $details;
    public $donation_needed;
    public $featured;
    public $date;
    public $date_from;
    public $date_to;
    public $time_from;
    public $time_to;

    public $showModal = false;

    public $modalTitle = '';
    public $modalDescription = '';

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function mount(Project $project)
    {
        $this->selectedProject = $project;

        $this->title = $project->projectable?->title;
        $this->subtitle = $project->projectable?->subtitle;
        $this->details = $project->projectable?->details;

        if($project->projectable_type == IncomingProject::class){
            $this->typeOfProject = $this->incomingProject;

            $this->date_from = $project->projectable?->date_from;
            $this->date_to = $project->projectable?->date_to;
            $this->time_from = $project->projectable?->time_from;
            $this->time_to = $project->projectable?->time_to;
        }
        else{
            $this->typeOfProject = $this->pastProject;

            $this->date = $project->projectable?->date;
        }

        $this->donation_needed = $project->donation_needed;
        $this->featured = $project->is_featured;
    }

    public function render()
    {
        return view('livewire.admin.project.projects-edit');
    }

    public function save(Project $project)
    {
        $this->modalTitle = 'Berjaya!';
        $this->modalDescription = 'Projek ' . $this->title . ' telah dikemaskini.';

        try {
            DB::beginTransaction();

            $project->update([
                'is_featured' => $this->featured,
                'donation_needed' => $this->donation_needed,
            ]);

            $project->projectable?->update([
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'details' => $this->details,
                'date_from' => $this->date_from,
                'date_to' => $this->date_to,
                'time_from' => $this->time_from,
                'time_to' => $this->time_to,
            ]);

            DB::commit();

            $this->openModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
