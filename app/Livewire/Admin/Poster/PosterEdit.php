<?php

namespace App\Livewire\Admin\Poster;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class PosterEdit extends Component
{
    use WithFileUploads;

    public $projects;
    public $folder_path;
    public $selectedProject;

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

    //upload poster
    public $showUploadPosterModal = false;

    public function openUploadPosterModal(Project $project)
    {
        $this->folder_path = $project->folder_path;
        $this->selectedProject = $project;

        $this->showUploadPosterModal = true;
    }

    public function closeUploadPosterModal()
    {
        $this->showUploadPosterModal = false;
    }

    public function mount($projects)
    {
        $this->projects = $projects;
    }

    public function render()
    {
        return view('livewire.admin.poster.poster-edit');
    }

    //untuk upload poster
    public $poster_image_upload;
    public $poster_image_path;

    public function uploadPoster()
    {
        $this->poster_image_path = '';

        $this->validate([
            'poster_image_upload' => 'required|image|max:5120',
        ],[],[
            'poster_image_upload' => __('ui_text.images'),
        ]);

        $folderPath = strtolower($this->folder_path);
        $folderPath = str_replace(' ', '_', $folderPath);
        $fileName = $folderPath.'.jpg';

        $this->poster_image_upload->storeAs('poster', $fileName, 'public');

        $this->poster_image_path = 'poster/'.$fileName;

        try {
            DB::beginTransaction();

            $this->selectedProject->projectable->update([
                'poster_image_path' => $this->poster_image_path,
            ]);

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        $this->closeUploadPosterModal();

        return redirect()->route('poster.index');
    }

    public function deletePoster($projectId)
    {
        $project = Project::find($projectId);

        $posterPath = public_path('storage/poster/'.$project->folder_path.'.jpg');

        try {
            DB::beginTransaction();

            if (File::exists($posterPath)) {
                unlink($posterPath);
            }

            $project->projectable->update([
                'poster_image_path' => null,
            ]);

            DB::commit();

            return redirect()->route('poster.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
