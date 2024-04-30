<?php

namespace App\Livewire\Admin\Project;

use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ProjectsTable extends Component
{
    public $listOfProjects;
    public $incomingProject = IncomingProject::class;
    public $pastProject = PastProject::class;

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

    public function completeProject(Project $project)
    {
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

            $this->modalTitle = 'Berjaya!';
            $this->modalDescription = 'Projek ' . $project->projectable?->title . ' telah dikemaskini.';

            $this->openModal();

            return redirect()->route('project.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function deleteImages(Project $project)
    {
        return redirect()->route('project.delete_images', ['project' => $project]);
    }

    public function deleteProject(Project $project)
    {
        try {
            DB::beginTransaction();

            if($project->projectable_type == PastProject::class){
                $title = strtolower($project->projectable?->title);
                $title = str_replace(' ', '_', $title);

                ProjectImage::where('reference_type', $project->projectable_type)->where('referenced_id', $project->projectable?->id)->delete();

                //delete dalam public folder
                $folderPath = public_path('assets/img/'.$title);
                if (File::exists($folderPath)) {
                    File::deleteDirectory($folderPath);
                }
            }

            $posterPath = public_path('assets/img/poster/'.$title.'.jpg');
            if (file_exists($posterPath)) {
                unlink($posterPath);
            }

            $project->projectable?->delete();
            $project->delete();

            DB::commit();

            $this->modalTitle = 'Berjaya!';
            $this->modalDescription = 'Projek telah dihapus.';

            $this->openModal();

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
