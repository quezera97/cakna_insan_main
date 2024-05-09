<?php

namespace App\Livewire\Admin\Images;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImagesEdit extends Component
{
    use WithFileUploads;

    public $key;
    public $projectImage;
    public $previewImage = false;

    public $showConfirmationModal = false;

    public $functionPassed;
    public $paramPassed;

    public $confirmationModalTitle = '';

    public function openConfirmationModal($function, $param)
    {
        $this->functionPassed = $function;
        $this->paramPassed = $param;

        $this->confirmationModalTitle = 'Are you sure?';

        $this->showConfirmationModal = true;
    }

    public function closeConfirmationModal()
    {
        $this->showConfirmationModal = false;
    }

    public function acceptConfirmationModal()
    {
        if (method_exists($this, $this->functionPassed)) {
            call_user_func_array([$this, $this->functionPassed], [$this->paramPassed]);
        }

        $this->showConfirmationModal = false;
    }

    public function mount(projectImage $projectImage, $key)
    {
        $this->showConfirmationModal = false;

        $this->key = $key;
        $this->projectImage = $projectImage;
    }

    public function render()
    {
        return view('livewire.admin.images.images-edit');
    }

    public function previewSelectedImage()
    {
        $this->previewImage = true;
    }
    public function closeSelectedImage()
    {
        $this->previewImage = false;
    }

    public function deleteImages($projectImageId)
    {
        $imageName = $this->key;

        $projectImage = ProjectImage::with(['pastProject', 'pastProject.project'])->find($projectImageId);
        $project = $projectImage->pastProject?->project;

        $imagePath = public_path('storage/'.$project->folder_path.'/'.$imageName.'.jpg');

        try {
            DB::beginTransaction();

            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            $projectImage->delete();

            DB::commit();


            return redirect()->route('images.edit', ['type' => 'edit', 'project' => $project]);

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

    }

}
