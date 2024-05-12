<?php

namespace App\Livewire\Admin\News;

use App\Models\NewsDetail;
use App\Models\NewsImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class NewsEditImages extends Component
{
    public $selectedNewsImage;

    public $title;
    public $caption;

    public $editImage = false;
    public $showConfirmationModal = false;
    public $previewImage = false;

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

    public function mount(NewsImage $newsImage)
    {
        $this->selectedNewsImage = $newsImage;
    }

    public function render()
    {
        return view('livewire.admin.news.news-edit-images');
    }

    public function previewSelectedImage()
    {
        $this->previewImage = true;
    }

    public function closeSelectedImage()
    {
        $this->previewImage = false;
    }

    public function editSelectedImage(NewsImage $newsImage)
    {
        $this->title = $newsImage->title;
        $this->caption = $newsImage->caption;
        $this->editImage = true;
    }

    public function closeEditSelectedImage()
    {
        $this->editImage = false;
    }

    public function edit(NewsImage $newsImage)
    {
        $newsDetails = $newsImage->news;

        try {
            DB::beginTransaction();

            $newsImage->update([
                'title' => $this->title,
                'caption' => $this->caption,
            ]);

            DB::commit();

            return redirect()->route('news.edit-images', $newsDetails);

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
