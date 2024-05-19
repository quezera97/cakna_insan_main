<?php

namespace App\Livewire\Admin\Banner;

use App\Models\BannerJumbotron;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BannerEdit extends Component
{
    use WithFileUploads, WithPagination;

    public $selectedBanner;

    public $projects;

    public $title;
    public $subtitle;
    public $details;
    public $featured;
    public $banner_file_name;
    public $details_button_url;
    public $donation_button_url;

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

    //create new banner
    public $showUploadBannerModal = false;

    public function openUploadBannerModal()
    {
        $this->title = null;
        $this->subtitle = null;
        $this->details = null;
        $this->featured = null;
        $this->banner_file_name = null;
        $this->details_button_url = null;
        $this->donation_button_url = null;

        $this->banner_image_path = null;
        $this->banner_image_upload = null;

        $this->showUploadBannerModal = true;
    }

    public function closeUploadBannerModal()
    {
        $this->showUploadBannerModal = false;
    }

    //edit banner
    public $showEditBannerModal = false;

    public function openEditBannerModal($selectedBannerPath, $bannerFileName)
    {
        $this->selectedBannerPath = $selectedBannerPath;
        $this->banner_file_name = $bannerFileName;
        $this->showEditBannerModal = true;
    }

    public function closeEditBannerModal()
    {
        $this->showEditBannerModal = false;
    }

    //edit banner details
    public $showEditBannerDetailsModal = false;

    public function openEditBannerDetailsModal($bannerId)
    {
        $this->selectedBanner = BannerJumbotron::find($bannerId);

        $this->title = $this->selectedBanner->title;
        $this->subtitle = $this->selectedBanner->subtitle;
        $this->details = $this->selectedBanner->details;
        $this->featured = $this->selectedBanner->is_featured;
        $this->banner_file_name = $this->selectedBanner->banner_file_name;
        $this->details_button_url = $this->selectedBanner->details_button_url;
        $this->donation_button_url = $this->selectedBanner->donation_button_url;

        $this->showEditBannerDetailsModal = true;
    }

    public function closeEditBannerDetailsModal()
    {
        $this->showEditBannerDetailsModal = false;
    }

    public function mount()
    {
        $this->projects = Project::with(['projectable', 'donationDetail'])->orderBy('created_at', 'desc')->get();
    }

    public function bannerRender()
    {
        return BannerJumbotron::paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.banner.banner-edit', [
            'paginatedBannerJumbotron' => $this->bannerRender()
        ]);
    }

    public $previewBanner = false;
    public $selectedBannerPath;
    public function previewSelectedBanner($selectedBannerPath)
    {
        $this->selectedBannerPath = $selectedBannerPath;
        $this->previewBanner = true;
    }
    public function closeSelectedBanner()
    {
        $this->selectedBannerPath = null;
        $this->previewBanner = false;
    }

    //untuk upload banner
    public $banner_image_upload;
    public $banner_image_path;

    public function uploadBanner()
    {
        $this->banner_file_name = strtolower($this->title);
        $this->banner_file_name = str_replace(' ', '_', $this->banner_file_name);

        $this->banner_image_path = '';

        $this->validate([
            'title' => 'required|unique:banner_jumbotrons|string',
            'banner_file_name' => 'required|min:6|unique:banner_jumbotrons|string',
            'banner_image_upload' => 'required|image|max:5120',
            'featured' => 'required',
        ],[],[
            'title' => __('ui_text.title'),
            'banner_image_upload' => __('ui_text.images'),
            'featured' => __('ui_text.featured'),
        ]);

        $folderPath = strtolower($this->banner_file_name);
        $folderPath = str_replace(' ', '_', $folderPath);
        $fileName = $folderPath.'.jpg';

        $this->banner_image_path = 'banner/'.$fileName;

        $this->banner_image_upload->storeAs('banner', $fileName, 'public');

        try {
            DB::beginTransaction();

            BannerJumbotron::create([
                'title' => $this->title ?? null,
                'subtitle' => $this->subtitle ?? null,
                'details' => $this->details ?? null,
                'is_featured' => $this->featured ?? 0,
                'banner_file_name' => $this->banner_file_name ?? null,
                'banner_image_path' => $this->banner_image_path ?? null,
                'details_button_url' => $this->details_button_url ?? null,
                'donation_button_url' => $this->donation_button_url ?? null,
            ]);

            DB::commit();

            return redirect()->route('banner.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function uploadEditBanner()
    {
        $this->banner_file_name = strtolower($this->title);
        $this->banner_file_name = str_replace(' ', '_', $this->banner_file_name);

        $folderPath = strtolower($this->banner_file_name);
        $folderPath = str_replace(' ', '_', $folderPath);
        $fileName = $this->banner_file_name.'.jpg';

        $this->banner_image_path = 'banner/'.$fileName;

        $this->banner_image_upload->storeAs('banner', $fileName, 'public');

        $this->alertModalType = 'success';
        $this->alertModalDescription = 'Banner has been saved';

        $this->openAlertModal();
    }

    public function deleteBanner($bannerId)
    {
        $banner = BannerJumbotron::find($bannerId);

        $bannerPath = public_path('storage/banner/'.$banner->banner_file_name.'.jpg');

        try {
            DB::beginTransaction();

            if (File::exists($bannerPath)) {
                unlink($bannerPath);
            }

            $banner->delete();

            DB::commit();

            return redirect()->route('banner.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function editBannerDetails()
    {
        $this->banner_file_name = strtolower($this->title);
        $this->banner_file_name = str_replace(' ', '_', $this->banner_file_name);

        $this->validate([
            'title' => 'required|string',
            'banner_file_name' => [
                'required',
                'string',
                'min:6',
                Rule::unique('banner_jumbotrons')->ignore($this->selectedBanner->id),
            ],
            'featured' => 'required',
        ],[],[
            'title' => __('ui_text.title'),
            'featured' => __('ui_text.featured'),
        ]);

        $folderPath = strtolower($this->banner_file_name);
        $folderPath = str_replace(' ', '_', $folderPath);
        $fileName = $this->banner_file_name.'.jpg';

        $this->banner_image_path = 'banner/'.$fileName;

        $currentBannerPath = public_path('storage/banner/'.$this->selectedBanner->banner_file_name.'.jpg');
        $newBannerPath = public_path('storage/banner/'.$this->banner_file_name.'.jpg');
        if (File::exists($currentBannerPath)) {
            File::move($currentBannerPath, $newBannerPath);
        }

        $this->alertModalType = 'success';
        $this->alertModalDescription = 'Banner details has been saved';

        try {
            DB::beginTransaction();

           $this->selectedBanner->update([
                'title' => $this->title ?? null,
                'subtitle' => $this->subtitle ?? null,
                'details' => $this->details ?? null,
                'is_featured' => $this->featured ?? 0,
                'banner_file_name' => $this->banner_file_name ?? null,
                'banner_image_path' => $this->banner_image_path ?? null,
                'details_button_url' => $this->details_button_url ?? null,
                'donation_button_url' => $this->donation_button_url ?? null,
            ]);

            DB::commit();

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

}
