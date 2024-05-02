<?php

namespace App\Livewire\Admin\Project;

use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Livewire\Component;
class ProjectsEdit extends Component
{
    public $selectedProject;
    public $typeOfProject;
    public $pastProject = PastProject::class;
    public $incomingProject = IncomingProject::class;

    public $title;
    public $subtitle;
    public $details;
    public $folder_path;
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

    public function updatedTitle()
    {
        $this->folder_path = strtolower($this->title);
        $this->folder_path = str_replace(' ', '_', $this->folder_path);
    }

    public function updatedFolderPath()
    {
        $this->folder_path = strtolower($this->folder_path);
        $this->folder_path = str_replace(' ', '_', $this->folder_path);
    }

    public function save(Project $project)
    {
        $this->validate([
            'title' => [
                'required',
                'string',
                'min:6',
                Rule::unique('incoming_projects')->ignore($project->id),
                Rule::unique('past_projects')->ignore($project->id),
            ],
            'folder_path' => [
                'required',
                'string',
                'min:6',
                Rule::unique('projects')->ignore($project->id),
            ],
        ]);

        $currentFolderPath = public_path('storage/'.$project->folder_path);
        $newFolderPath = public_path('storage/'.$this->folder_path);
        if (File::exists($currentFolderPath)) {
            File::move($currentFolderPath, $newFolderPath);
        }

        $currentPosterPath = public_path('storage/poster/'.$project->folder_path.'.jpg');
        $newPosterPath = public_path('storage/poster/'.$this->folder_path.'.jpg');
        if (File::exists($currentPosterPath)) {
            File::move($currentPosterPath, $newPosterPath);
        }

        $this->alertModalTitle = 'Success!';
        $this->alertModalDescription = 'Project ' . $this->title . ' successfully edited.';

        $poster_image_path = 'poster/'.$this->folder_path.'.jpg';

        try {
            DB::beginTransaction();

            $project->update([
                'is_featured' => $this->featured,
                'donation_needed' => $this->donation_needed,
                'folder_path' => $this->folder_path,
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
                    'poster_image_path' => $poster_image_path ?? null,
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
                    'poster_image_path' => $poster_image_path ?? null,
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
