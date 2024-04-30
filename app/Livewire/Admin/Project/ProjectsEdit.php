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
    public $place;
    public $pax;
    public $transportation;

    public $uploadedImages = [];

    //modal untuk notification
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

            foreach($project->projectable?->pastProjectImages as $image){
                $this->uploadedImages[] = $image->image_path;
            }
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
                    'poster_image_path' => $this->poster_image_path,
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
                    'poster_image_path' => $this->poster_image_path,
                ]);

                if(!empty($this->images_path)){
                    //delete dalam db
                    ProjectImage::where('reference_type', $project->projectable_type)->where('referenced_id', $project->projectable?->id)->delete();

                    //delete dalam public folder
                    $folderPath = public_path('assets/img/'.$this->folder);
                    if (File::exists($folderPath)) {
                        File::deleteDirectory($folderPath);
                    }

                    $this->uploadImages();

                    foreach ($this->images_path as $key => $imagePath) {
                        ProjectImage::updateOrCreate(
                            [
                                'image_path' => $imagePath,
                            ],
                            [
                                'reference_type' => $project->projectable_type,
                                'referenced_id' => $project->projectable?->id,
                                'title' => '',
                                'caption' => '',
                            ]
                        );
                    }
                }
            }

            DB::commit();

            $this->openModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
