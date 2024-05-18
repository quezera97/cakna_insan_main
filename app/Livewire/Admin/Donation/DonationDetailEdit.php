<?php

namespace App\Livewire\Admin\Donation;

use App\Models\DonationDetail;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DonationDetailEdit extends Component
{
    use WithPagination;

    public $donation_url;
    public $project;
    public $projectWithDonationDetail;

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

    //create new URL
    public $showDonationDetailModal = false;

    public function openDonationDetailModal($projectId, $type)
    {
        if(empty($projectId)){
            $this->project = null;
            $this->donation_url = null;
        }
        else{
            $selectedDonationDetail = DonationDetail::where('project_id', $projectId)->first();

            $this->project = $selectedDonationDetail->project_id;
            $this->donation_url = $selectedDonationDetail->donation_url;
        }

        $this->showDonationDetailModal = true;
    }

    public function closeDonationDetailModal()
    {
        $this->showDonationDetailModal = false;
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

    public $projects;
    public function mount()
    {
        $this->projects = Project::with(['projectable', 'donationDetail'])->orderBy('created_at', 'desc')->get();
    }

    public function donationDetailRender()
    {
        return Project::paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.donation.donation-detail-edit', [
            'paginatedDonationDetail' => $this->donationDetailRender()
        ]);
    }

    public function saveDonationDetail()
    {
        $this->validate([
            'project' => 'required',
            'donation_url' => 'required|string',
        ],[],[
            'project' => __('ui_text.projects'),
            'donation_url' => __('ui_text.donation_link'),
        ]);

        try {
            DB::beginTransaction();

            DonationDetail::updateOrCreate([
                'project_id' => $this->project
            ],[
                'donation_url' => $this->donation_url,
            ]);

            DB::commit();

            return redirect()->route('donation.donation-detail');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

    }

    public function deleteUrl($projectId)
    {
        $donationDetail = DonationDetail::where('project_id', $projectId)->first();

        try {
            DB::beginTransaction();

            $donationDetail->delete();

            DB::commit();

            return redirect()->route('donation.donation-detail');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
