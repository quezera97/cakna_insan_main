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

    //modal untuk notification
    public $showAlertModal = false;

    public $alertModalType = '';
    public $alertModalDescription = '';

    public function openAlertModal()
    {
        $this->showAlertModal = true;
    }

    public function closeAlertModal()
    {
        $this->showAlertModal = false;
    }

    public $folder_path;
    public $project;

    public function mount(Project $project)
    {
        $this->folder_path = $project->folder_path;
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.admin.images.images-upload');
    }

    //untuk upload gambar
    public $imagesUpload = [
        'uploaded_images' => [],
        'title' => [],
        'caption' => [],
        'image_path' => [],
        'arrangement' => null,
    ];

    public function uploadImages(Project $project)
    {
        $this->validate([
            'imagesUpload.uploaded_images.*' => 'required|image|max:5120',
        ],[],[
            'imagesUpload.uploaded_images.*' => 'Image Uploaded',
        ]);

        $uploadedImages = (object)$this->imagesUpload['uploaded_images'];

        foreach ($uploadedImages as $key => $image) {
            $image->storeAs('projects/'.$this->folder_path, $key.'.jpg', 'public');
            $this->imagesUpload['image_path'][] = 'projects/'.$this->folder_path.'/'.$key.'.jpg';
        }

        try {
            DB::beginTransaction();

            foreach ($this->imagesUpload['image_path'] as $key => $imagePath) {
                ProjectImage::updateOrCreate([
                    'image_path' => $imagePath,
                ],[
                    'reference_type' => $project->projectable_type,
                    'referenced_id' => $project->projectable_id,
                    'title' => $this->imagesUpload['title'][$key],
                    'caption' => $this->imagesUpload['caption'][$key],
                    'arrangement' => $key,
                ]);
            }

            DB::commit();

            $this->alertModalType = 'success';
            $this->alertModalDescription = 'Other images successfully edited.';

            $this->openAlertModal();

            return redirect()->route('images.edit', $this->project);

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

}
