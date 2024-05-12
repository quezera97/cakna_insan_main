<?php

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use App\Models\ProjectBanner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectsBanner extends Component
{
    use WithFileUploads;

    public $projects;
    public $title;
    public $caption;

    public $folder_path;
    public $selectedProject;
    public $image_upload;
    public $image_path;

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

    //upload poster
    public $showUploadBannerModal = false;

    public function openUploadBannerModal(Project $project)
    {
        $this->folder_path = $project->folder_path;
        $this->selectedProject = $project;

        $this->showUploadBannerModal = true;
    }

    public function closeUploadBannerModal()
    {
        $this->showUploadBannerModal = false;
    }

    public function mount($projects)
    {
        $this->projects = $projects;
    }

    public function render()
    {
        return view('livewire.admin.project.projects-banner');
    }

    public function uploadBanner()
    {
        $this->validate([
            'image_upload' => 'required|image|max:5120',
        ]);

        $bannerImageUpload = (object) $this->image_upload;
        $bannerImageUpload->storeAs('projects/' . $this->folder_path, 'banner_image.jpg', 'public');
        $this->image_path = 'projects/' . $this->folder_path . '/banner_image.jpg';

        try {
            DB::beginTransaction();

            ProjectBanner::updateOrCreate([
                'project_id' => $this->selectedProject->id,
            ],[
                'title' => $this->title,
                'caption' => $this->caption,
                'image_path' => $this->image_path,
            ]);

            DB::commit();

            $this->alertModalType = 'success';
            $this->alertModalDescription = 'Banner image successfully added.';

            $this->openAlertModal();

            return redirect()->route('project.banner');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public  $editImage = false;
    public function editSelectedImage(Project $project)
    {
        $this->title = $project->banner?->title;
        $this->caption = $project->banner?->caption;
        $this->editImage = true;
    }

    public function closeEditSelectedImage()
    {
        $this->editImage = false;
    }

    public function edit(Project $project)
    {
        try {
            DB::beginTransaction();

            $project->banner?->update([
                'title' => $this->title,
                'caption' => $this->caption,
            ]);

            DB::commit();

            $this->alertModalType = 'success';
            $this->alertModalDescription = 'Banner image successfully edited.';

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function deleteBanner($projectId)
    {
        $project = Project::find($projectId);

        $posterPath = public_path('storage/'.$project->banner?->image_path);

        try {
            DB::beginTransaction();

            if (File::exists($posterPath)) {
                unlink($posterPath);
            }

            $project->banner?->delete();

            DB::commit();

            return redirect()->route('project.banner');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
