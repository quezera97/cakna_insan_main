<?php

namespace App\Livewire\Admin\Poster;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PosterEdit extends Component
{
    use WithFileUploads;

    public $projects;
    public $title;
    public $selectedProject;

    public $showConfirmationModal = false;

    public $functionPassed;
    public $paramPassed;

    public $confirmationModalTitle = '';
    public $confirmationModalDescription = '';

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
        $this->title = $project->projectable?->title;
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
            'poster_image_upload' => 'image|max:1024',
        ]);

        $title = strtolower($this->title);
        $title = str_replace(' ', '_', $title);
        $fileName = $title.'.jpg';

        $this->poster_image_upload->storeAs('poster', $fileName, 'poster_public_path');

        $this->poster_image_path = asset('assets/img/poster/'.$fileName);

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
    }

    public function deletePoster($projectId)
    {
        $project = Project::find($projectId);

        $title = strtolower($project->projectable?->title);
        $title = str_replace(' ', '_', $title);

        $posterPath = public_path('assets/img/poster/'.$title.'.jpg');

        try {
            DB::beginTransaction();

            if (file_exists($posterPath)) {
                unlink($posterPath);
            }

            $project->projectable->update([
                'poster_image_path' => null,
            ]);

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
