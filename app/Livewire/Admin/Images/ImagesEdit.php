<?php

namespace App\Livewire\Admin\Images;

use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImagesEdit extends Component
{
    use WithFileUploads;

    public $projectImage;
    public $title;
    public $caption;
    public $previewImage = false;
    public $editImage = false;

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

    public function mount(ProjectImage $projectImage)
    {
        $this->showConfirmationModal = false;

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

    public function editSelectedImage(ProjectImage $projectImage)
    {
        $this->title = $projectImage->title;
        $this->caption = $projectImage->caption;
        $this->editImage = true;
    }

    public function closeEditSelectedImage()
    {
        $this->editImage = false;
    }

    public function edit(ProjectImage $projectImage)
    {
        if($projectImage->reference_type == PastProject::class){
            $project = $projectImage->pastProject?->project;
        }
        elseif($projectImage->reference_type == IncomingProject::class){
            $project = $projectImage->incomingProject?->project;
        }

        try {
            DB::beginTransaction();

            $projectImage->update([
                'title' => $this->title,
                'caption' => $this->caption,
            ]);

            DB::commit();

            return redirect()->route('images.edit', $project);

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function deleteImages($projectImageId)
    {
        if($this->projectImage->reference_type == PastProject::class){
            $project = $this->projectImage->pastProject?->project;
        }
        elseif($this->projectImage->reference_type == IncomingProject::class){
            $project = $this->projectImage->incomingProject?->project;
        }

        $imagePath = public_path('storage/'.$this->projectImage->image_path);

        try {
            DB::beginTransaction();

            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            $this->projectImage->delete();

            DB::commit();

            return redirect()->route('images.edit', $project);

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

    }

}
