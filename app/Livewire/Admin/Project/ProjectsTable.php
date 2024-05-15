<?php

namespace App\Livewire\Admin\Project;

use App\Models\DonationDetail;
use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
use App\Models\ProjectDonation;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectsTable extends Component
{
    use WithFileUploads;

    public $listOfProjects;
    public $incomingProject = IncomingProject::class;
    public $pastProject = PastProject::class;

    //untuk confirmation modal
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

    public function mount($projects)
    {
        $this->listOfProjects = $projects;
    }

    public function editProject(Project $project)
    {
        return redirect()->route('project.edit', ['project' => $project]);
    }

    public function addProject()
    {
        return redirect()->route('project.add');
    }

    public function completeProject($projectId)
    {
        $project = Project::find($projectId);

        try {
            DB::beginTransaction();

            $pastProject = PastProject::create([
                'title' => $project->projectable?->title,
                'subtitle' => $project->projectable?->subtitle,
                'details' => $project->projectable?->details,
                'date' => $project->projectable?->date_from,
                'place' => $project->projectable?->place,
                'pax' => $project->projectable?->pax,
                'transportation' => $project->projectable?->transportation,
                'poster_image_path' => $project->projectable?->poster_image_path,
            ]);

            $project->update([
                'projectable_type' => PastProject::class,
                'projectable_id' => $pastProject->id,
                'has_passed' => true,
                'is_featured' => false,
            ]);

            $project->projectable?->delete();

            DB::commit();

            return redirect()->route('project.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function deleteProject($projectId)
    {
        $project = Project::with(['projectDonation', 'donationDetail'])->find($projectId);
        $folderPath = public_path('storage/projects/'.$project->folder_path);

        try {
            DB::beginTransaction();


            $projectImages = ProjectImage::where('reference_type', $project->projectable_type)->where('referenced_id', $project->projectable?->id)->get();

            foreach ($projectImages as $projectImage) {
                $projectImage->delete();
            }

            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            $posterPath = public_path('storage/poster/'.$project->folder_path.'.jpg');
            if (File::exists($posterPath)) {
                unlink($posterPath);
            }

            foreach($project->projectDonation as $donation){
                $donation->delete();
            }

            $project->donationDetail?->delete();

            $project->projectable?->delete();
            $project->delete();

            DB::commit();

            return redirect()->route('project.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function render()
    {
        return view('livewire.admin.project.projects-table');
    }
}
