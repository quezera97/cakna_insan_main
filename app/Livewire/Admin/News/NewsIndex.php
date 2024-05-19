<?php

namespace App\Livewire\Admin\News;

use App\Models\NewsDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class NewsIndex extends Component
{
    use WithPagination;

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

    public function newsDetailRender()
    {
        return NewsDetail::paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.news.news-index', [
            'paginatedNewsDetail' => $this->newsDetailRender()
        ]);
    }

    public function addNews()
    {
        return redirect()->route('news.add');
    }

    public function editNews(NewsDetail $newsDetail)
    {
        return redirect()->route('news.edit', [$newsDetail]);
    }

    public function editNewsImages(NewsDetail $newsDetail)
    {
        return redirect()->route('news.edit-images', $newsDetail);
    }


    public function deleteNews($newsId)
    {
        $newsDetail = NewsDetail::with('newsImage')->find($newsId);
        $folderPath = public_path('storage/news/'.$newsDetail->folder_path);

        try {
            DB::beginTransaction();

            foreach ($newsDetail->newsImage as $image) {
                $image->delete();
            }

            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            $newsDetail->delete();

            DB::commit();

            return redirect()->route('news.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        dd($newsDetail);
    }
}
