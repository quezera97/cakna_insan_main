<?php

namespace App\Livewire\Admin\Images;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImagesUpload extends Component
{
    use WithFileUploads;

    public $folder_path;
    public $project;

    //upload gambar
    public $uploadedImages = [];
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
        $this->folder_path = $project->folder_path;
        $this->project = $project;

        $this->openUploadImagesModal();
    }

    public function render()
    {
        return view('livewire.admin.images.images-upload');
    }

    //untuk upload gambar
    public $images_upload;
    public $images_path = [];

    public function uploadImages()
    {
        $this->images_path = [];
        $this->validate([
            'images_upload.*' => 'image|max:1024',
        ],[],[
            'images_upload.*' => 'Image Uploaded',
        ]);

        $folderPath = strtolower($this->folder_path);
        $folderPath = str_replace(' ', '_', $folderPath);

        try {
            DB::beginTransaction();

            foreach ($this->images_upload as $key => $photo) {
                $fileName = $key.'.jpg';
                $photo->storeAs($folderPath, $fileName, 'images_public_path');
                $this->images_path[] = asset('assets/img/'.$folderPath.'/'.$fileName);
            }

            foreach ($this->images_path as $key => $imagePath) {
                ProjectImage::updateOrCreate(
                    [
                        'image_path' => $imagePath,
                    ],
                    [
                        'reference_type' => $this->project->projectable_type,
                        'referenced_id' => $this->project->projectable?->id,
                        'title' => '',
                        'caption' => '',
                    ]
                );
            }

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        $this->closeUploadImagesModal();

        return redirect()->route('images.edit', ['edit', $this->project]);
    }

}
