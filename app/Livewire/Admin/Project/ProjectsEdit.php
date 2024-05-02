<?php

namespace App\Livewire\Admin\Project;

use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
class ProjectsEdit extends Component
{
    public $selectedProject;
    public $typeOfProject;
    public $pastProject = PastProject::class;
    public $incomingProject = IncomingProject::class;

    public $folder_path;

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
    public $place;
    public $pax;
    public $transportation;

    //modal untuk notification
    public $showAlertModal = false;

    public $alertModalTitle = '';
    public $alertModalDescription = '';

    public function openAlertModal()
    {
        $this->showAlertModal = true;
    }

    public function closeAlertModal()
    {
        $this->showAlertModal = false;
    }

    public function mount(Project $project)
    {
        $this->selectedProject = $project;

        $this->folder_path = $project->folder_path;

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
        $this->place = $project->projectable?->place;
        $this->pax = $project->projectable?->pax;
        $this->transportation = $project->projectable?->transportation;
    }

    public function render()
    {
        return view('livewire.admin.project.projects-edit');
    }

    public function save(Project $project)
    {
        $this->alertModalTitle = 'Success!';
        $this->alertModalDescription = 'Project ' . $this->title . ' successfully edited.';

        try {
            DB::beginTransaction();

            $project->update([
                'is_featured' => $this->featured,
                'donation_needed' => $this->donation_needed,
            ]);

            if($project->projectable_type == IncomingProject::class){
                $project->projectable?->update([
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                    'details' => $this->details,
                    'date_from' => $this->date_from,
                    'date_to' => $this->date_to,
                    'time_from' => $this->time_from,
                    'time_to' => $this->time_to,
                    'place' => $this->place,
                    'pax' => $this->pax,
                    'transportation' => $this->transportation,
                    'poster_image_path' => $project->projectable?->poster_image_path ?? null,
                ]);
            }
            else{
                $project->projectable?->update([
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                    'details' => $this->details,
                    'date' => $this->date,
                    'place' => $this->place,
                    'pax' => $this->pax,
                    'transportation' => $this->transportation,
                    'poster_image_path' => $project->projectable?->poster_image_path ?? null,
                ]);
            }

            DB::commit();

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
