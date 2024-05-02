<?php

namespace App\Livewire\Admin\Project;

use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProjectsAdd extends Component
{
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

    public function render()
    {
        return view('livewire.admin.project.projects-add');
    }

    public $forIncomingProject = false;
    public $forPastProject = false;

    public function selectProject($type)
    {
        if($type == 'incoming'){
            $this->typeOfProject = $this->incomingProject;

            $this->forIncomingProject = true;
            $this->forPastProject = false;
        }
        else{
            $this->typeOfProject = $this->pastProject;

            $this->forIncomingProject = false;
            $this->forPastProject = true;
        }
    }

    public function save()
    {
        $folderPath = strtolower($this->title);
        $folderPath = str_replace(' ', '_', $folderPath);

        try {
            DB::beginTransaction();

            if($this->typeOfProject == IncomingProject::class){
                $incomingProject = IncomingProject::create([
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
                    'poster_image_path' => null,
                ]);

                Project::create([
                    'projectable_type' => IncomingProject::class,
                    'projectable_id' => $incomingProject->id,
                    'has_passed' => false,
                    'is_featured' => $this->featured,
                    'donation_needed' => $this->donation_needed,
                    'folder_path' => $folderPath,
                ]);
            }
            else{
                $pastProject = PastProject::create([
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                    'details' => $this->details,
                    'date' => $this->date,
                    'place' => $this->place,
                    'pax' => $this->pax,
                    'transportation' => $this->transportation,
                    'poster_image_path' => null,
                ]);

                Project::create([
                    'projectable_type' => PastProject::class,
                    'projectable_id' => $pastProject->id,
                    'has_passed' => true,
                    'is_featured' => false,
                    'donation_needed' => $this->donation_needed,
                    'folder_path' => $folderPath,
                ]);
            }

            DB::commit();

            return redirect()->route('project.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
