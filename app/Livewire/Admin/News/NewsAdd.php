<?php

namespace App\Livewire\Admin\News;

use App\Models\NewsDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NewsAdd extends Component
{
    public $type_of_news;
    public $title;
    public $subtitle;
    public $details;
    public $date;
    public $related_url;
    public $author;
    public $folder_path;

    public function render()
    {
        return view('livewire.admin.news.news-add');
    }

    public $typeOfNews;
    public $forGlobalNews = false;
    public $forDomesticNews = false;
    public $forCaknaInsanNews = false;

    public function selectNews($type)
    {
        $this->typeOfNews = $this->type_of_news = '';

        if($type == 'global'){
            $this->typeOfNews = $this->type_of_news = 'global';

            $this->forGlobalNews = true;
            $this->forDomesticNews = false;
            $this->forCaknaInsanNews = false;
        }
        elseif($type == 'domestic'){
            $this->typeOfNews = $this->type_of_news = 'domestic';

            $this->forGlobalNews = false;
            $this->forDomesticNews = true;
            $this->forCaknaInsanNews = false;
        }
        elseif($type == 'cakna_insan'){
            $this->typeOfNews = $this->type_of_news = 'cakna_insan';

            $this->forGlobalNews = false;
            $this->forDomesticNews = false;
            $this->forCaknaInsanNews = true;

            $this->author = 'Cakna Insan Malaysia';
        }
    }

    public function save()
    {
        $this->folder_path = strtolower($this->title);
        $this->folder_path = str_replace(' ', '_', $this->folder_path);

        $this->validate([
            'title' => 'required|string|min:6|unique:news_details',
        ],[],[
            'title' => __('ui_text.title'),
        ]);

        try {
            DB::beginTransaction();

            NewsDetail::create([
                'type_of_news' => $this->type_of_news,
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'details' => $this->details,
                'date' => $this->date,
                'related_url' => $this->related_url,
                'author' => $this->author,
                'folder_path' => $this->folder_path,
            ]);

            DB::commit();

            return redirect()->route('news.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
