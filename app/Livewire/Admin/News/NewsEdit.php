<?php

namespace App\Livewire\Admin\News;

use App\Models\NewsDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Livewire\Component;

class NewsEdit extends Component
{
    public $selectedNewsDetail;

    public $type_of_news;
    public $title;
    public $subtitle;
    public $details;
    public $date;
    public $related_url;
    public $folder_path;

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

    public function mount(NewsDetail $newsDetail)
    {
        $this->selectedNewsDetail = $newsDetail;

        $this->type_of_news = $newsDetail->type_of_news;
        $this->title = $newsDetail->title;
        $this->subtitle = $newsDetail->subtitle;
        $this->details = $newsDetail->details;
        $this->date = $newsDetail->date;
        $this->related_url = $newsDetail->related_url;
        $this->folder_path = $newsDetail->folder_path;
    }

    public function render()
    {
        return view('livewire.admin.news.news-edit');
    }

    public function save(NewsDetail $newsDetail)
    {
        $this->folder_path = strtolower($this->title);
        $this->folder_path = str_replace(' ', '_', $this->folder_path);

        $this->validate([
            'title' => [
                'required',
                'string',
                'min:6',
                Rule::unique('news_details')->ignore($newsDetail->id),
            ],
        ]);

        $currentNewsPath = public_path('storage/news/'.$newsDetail->folder_path);
        $newNewsPath = public_path('storage/news/'.$this->folder_path);
        if (File::exists($currentNewsPath)) {
            File::move($currentNewsPath, $newNewsPath);
        }

        try {
            DB::beginTransaction();

            foreach($newsDetail->newsImage as $image){
                $replacedImagePath = str_replace($newsDetail->folder_path, $this->folder_path, $image->image_path);

                $image->update([
                    'image_path' => $replacedImagePath,
                ]);
            }

            $newsDetail->update([
                'type_of_news' => $this->type_of_news,
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'details' => $this->details,
                'date' => $this->date,
                'related_url' => $this->related_url,
                'folder_path' => $this->folder_path,
            ]);

            DB::commit();

            $this->alertModalType = 'success';
            $this->alertModalDescription = 'News ' . $this->title . ' successfully edited.';

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
