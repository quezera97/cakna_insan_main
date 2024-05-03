<?php

namespace App\Livewire\Admin\Banner;

use App\Models\BannerJumbotron;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerEdit extends Component
{
    use WithFileUploads;

    public $bannerJumbotron;

    public $title;
    public $subtitle;
    public $details;
    public $date_from;
    public $date_to;
    public $is_featured;
    public $banner_file_name;

    //upload banner
    public $showUploadBannerModal = false;

    public function openUploadBannerModal()
    {
        $this->showUploadBannerModal = true;
    }

    public function closeUploadBannerModal()
    {
        $this->showUploadBannerModal = false;
    }

    public function mount($bannerJumbotron)
    {
        $this->bannerJumbotron = $bannerJumbotron;
    }

    public function render()
    {
        return view('livewire.admin.banner.banner-edit');
    }

    public function updatedTitle()
    {
        $this->banner_file_name = strtolower($this->title);
        $this->banner_file_name = str_replace(' ', '_', $this->banner_file_name);
    }

    public function updatedBannerFileName()
    {
        $this->banner_file_name = strtolower($this->banner_file_name);
        $this->banner_file_name = str_replace(' ', '_', $this->banner_file_name);
    }

    //untuk upload banner
    public $banner_image_upload;
    public $banner_image_path;

    public function uploadBanner()
    {
        $this->banner_image_path = '';

        $this->validate([
            'banner_file_name' => 'required|unique:banner_jumbotrons|string',
            'banner_image_upload' => 'required|image|max:1024',
        ]);

        $folderPath = strtolower($this->banner_file_name);
        $folderPath = str_replace(' ', '_', $folderPath);
        $fileName = $folderPath.'.jpg';

        $this->banner_image_upload->storeAs('banner', $fileName, 'public');

        $this->banner_image_path = 'banner/'.$fileName;

        try {
            DB::beginTransaction();

            BannerJumbotron::create([
                'title' => $this->title ?? null,
                'subtitle' => $this->subtitle ?? null,
                'details' => $this->details ?? null,
                'date_from' => $this->date_from ?? null,
                'date_to' => $this->date_to ?? null,
                'is_featured' => $this->is_featured ?? null,
                'banner_file_name' => $this->banner_file_name ?? null,
                'banner_image_path' => $this->banner_image_path ?? null,
            ]);

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        $this->closeUploadBannerModal();
    }

}
