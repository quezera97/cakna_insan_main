<?php

namespace App\Livewire\Admin\News;

use App\Models\NewsDetail;
use App\Models\NewsImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewsAddImages extends Component
{
    use WithFileUploads;

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

    public $selectedNewsDetail;
    public $folder_path;

    public $mainImage = [
        'links' => 'main',
        'main_image' => null,
        'title' => null,
        'caption' => null,
        'image_path' => null,
        'arrangement' => null,
    ];
    public $bannerImage = [
        'links' => 'banner',
        'banner_image' => null,
        'title' => null,
        'caption' => null,
        'image_path' => null,
        'arrangement' => null,
    ];
    public $otherImages = [
        'links' => 'others',
        'other_images' => [],
        'title' => [],
        'caption' => [],
        'image_path' => [],
        'arrangement' => null,
    ];

    public $activeLink = 'main';

    public function setActive($link)
    {
        $this->activeLink = $link;
    }

    public function mount(NewsDetail $newsDetail)
    {
        $this->selectedNewsDetail = $newsDetail;
        $this->folder_path = $newsDetail->folder_path;
    }

    public function render()
    {
        return view('livewire.admin.news.news-add-images');
    }

    public function save(NewsDetail $newsDetail, $selectedImage)
    {
        if($selectedImage == $this->mainImage['links']){

            $this->validate([
                'mainImage.main_image' => 'required|image|max:5120',
            ]);

            $mainImageUpload = (object) $this->mainImage['main_image'];
            $mainImageUpload->storeAs('news/' . $this->folder_path, 'main_image.jpg', 'public');
            $this->mainImage['image_path'] = 'news/' . $this->folder_path . '/main_image.jpg';

            try {
                DB::beginTransaction();

                NewsImage::updateOrCreate([
                        'news_id' => $newsDetail->id,
                        'type' => $selectedImage,
                    ],[
                        'title' => $this->mainImage['title'],
                        'caption' => $this->mainImage['caption'],
                        'image_path' => $this->mainImage['image_path'],
                        'arrangement' => null,
                    ]
                );

                DB::commit();

                $this->alertModalType = 'success';
                $this->alertModalDescription = 'Main image successfully added.';
                $this->openAlertModal();

                return redirect()->route('news.edit-images', $this->selectedNewsDetail);

            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
        elseif($selectedImage == $this->bannerImage['links']){
            $this->validate([
                'bannerImage.banner_image' => 'required|image|max:5120',
            ]);

            $bannerImageUpload = (object) $this->bannerImage['banner_image'];
            $bannerImageUpload->storeAs('news/' . $this->folder_path, 'banner_image.jpg', 'public');
            $this->bannerImage['image_path'] = 'news/' . $this->folder_path . '/banner_image.jpg';

            try {
                DB::beginTransaction();

                NewsImage::updateOrCreate([
                        'news_id' => $newsDetail->id,
                        'type' => $selectedImage,
                    ],[
                        'title' => $this->bannerImage['title'],
                        'caption' => $this->bannerImage['caption'],
                        'image_path' => $this->bannerImage['image_path'],
                        'arrangement' => null,
                    ]
                );

                DB::commit();

                $this->alertModalType = 'success';
                $this->alertModalDescription = 'Banner image successfully added.';

                $this->openAlertModal();

                return redirect()->route('news.edit-images', $this->selectedNewsDetail);

            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
        elseif($selectedImage == $this->otherImages['links']){
            $this->validate([
                'otherImages.other_images.*' => 'required|image|max:5120',
            ]);

            $otherImagesUpload = $this->otherImages['other_images'];
            foreach ($otherImagesUpload as $key => $image) {
                $image->storeAs('news/'.$this->folder_path, $key.'.jpg', 'public');
                $this->otherImages['image_path'][] = 'news/'.$this->folder_path.'/'.$key.'.jpg';
            }

            try {
                DB::beginTransaction();
                foreach ($this->otherImages['image_path'] as $key => $imagePath) {
                    NewsImage::updateOrCreate([
                        'news_id' => $newsDetail->id,
                        'type' => $selectedImage,
                        'image_path' => $imagePath,
                    ],[
                        'title' => $this->otherImages['title'][$key],
                        'caption' => $this->otherImages['caption'][$key],
                        'arrangement' => $key,
                    ]);

                }

                DB::commit();

                $this->alertModalType = 'success';
                $this->alertModalDescription = 'Other images successfully added.';

                $this->openAlertModal();

                return redirect()->route('news.edit-images', $this->selectedNewsDetail);

            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
    }
}
