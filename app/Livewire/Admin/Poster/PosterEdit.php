<?php

namespace App\Livewire\Admin\Poster;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PosterEdit extends Component
{
    public $projects;

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
        $this->projects = $projects;
    }

    public function render()
    {
        return view('livewire.admin.poster.poster-edit');
    }

    public function editPoster(Project $project)
    {
        dd($project);
    }

    public function deletePoster(Project $project)
    {
        try {
            DB::beginTransaction();

            $title = strtolower($project->projectable?->title);
            $title = str_replace(' ', '_', $title);

            $posterPath = public_path('assets/img/poster/'.$title.'.jpg');
            if (file_exists($posterPath)) {
                unlink($posterPath);
            }

            $project->projectable->update([
                'poster_image_path' => null,
            ]);

            DB::commit();

            $this->modalTitle = 'Berjaya!';
            $this->modalDescription = 'Poster '.$project->projectable?->title.' telah dihapus.';

            $this->openModal();

            return redirect()->route('poster.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
