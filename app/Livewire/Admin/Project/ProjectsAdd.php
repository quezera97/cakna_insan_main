<?php

namespace App\Livewire\Admin\Project;

use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectsAdd extends Component
{
    use WithFileUploads;

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

    public $uploadedImages = [];

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

    //upload poster
    public $showUploadPosterModal = false;

    public function openUploadPosterModal()
    {
        $this->showUploadPosterModal = true;
    }

    public function closeUploadPosterModal()
    {
        $this->showUploadPosterModal = false;
    }

    //upload gambar
    public $showUploadImagesModal = false;

    public function openUploadImagesModal()
    {
        $this->showUploadImagesModal = true;
    }

    public function closeUploadImagesModal()
    {
        $this->showUploadImagesModal = false;
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

    public function updatedPosterImageUpload()
    {
        $this->validate([
            'poster_image_upload' => 'image|max:1024',
        ]);
    }

    //untuk upload poster
    public $poster_image_upload;
    public $poster_image_path;

    public function uploadPoster()
    {
        $this->poster_image_path = '';

        $this->validate([
            'poster_image_upload' => 'image|max:1024',
        ]);

        $title = strtolower($this->title);
        $title = str_replace(' ', '_', $title);
        $fileName = $title.'.jpg';

        $this->poster_image_upload->storeAs('poster', $fileName, 'poster_public_path');

        $this->poster_image_path = asset('assets/img/poster/'.$fileName);

        $this->closeUploadPosterModal();
    }

    //untuk upload gambar
    public $images_upload;
    public $folder;
    public $images_path = [];

    public function uploadImages()
    {
        $this->images_path = [];
        $this->validate([
            'images_upload.*' => 'image|max:1024',
        ],[],[
            'images_upload.*' => 'Image Uploaded',
        ]);

        $title = strtolower($this->title);
        $title = str_replace(' ', '_', $title);
        $this->folder = $title;

        foreach ($this->images_upload as $key => $photo) {
            $fileName = $key.'.jpg';
            $photo->storeAs($this->folder, $fileName, 'images_public_path');
            $this->images_path[] = asset('assets/img/'.$this->folder.'/'.$fileName);
        }

        $this->closeUploadImagesModal();

    }

    public function save()
    {
        $this->alertModalTitle = 'Berjaya!';
        $this->alertModalDescription = 'Projek ' . $this->title . ' telah dikemaskini.';

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
                    'poster_image_path' => $this->poster_image_path,
                ]);

                Project::create([
                    'projectable_type' => IncomingProject::class,
                    'projectable_id' => $incomingProject->id,
                    'has_passed' => false,
                    'is_featured' => $this->featured,
                    'donation_needed' => $this->donation_needed,
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
                    'poster_image_path' => $this->poster_image_path,
                ]);

                Project::create([
                    'projectable_type' => PastProject::class,
                    'projectable_id' => $pastProject->id,
                    'has_passed' => true,
                    'is_featured' => false,
                    'donation_needed' => $this->donation_needed,
                ]);

                if(!empty($this->images_path)) {
                    foreach ($this->images_path as $key => $imagePath) {
                        ProjectImage::updateOrCreate(
                            [
                                'image_path' => $imagePath,
                            ],
                            [
                                'reference_type' => PastProject::class,
                                'referenced_id' => $pastProject->id,
                                'title' => '',
                                'caption' => '',
                            ]
                        );
                    }
                }
            }

            DB::commit();

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
