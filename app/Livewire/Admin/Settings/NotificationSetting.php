<?php

namespace App\Livewire\Admin\Settings;

use App\Models\DonorDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class NotificationSetting extends Component
{
    use WithPagination;

    public $donorDetail;
    public $donors = [];
    public $selectedDonor;
    public $name;
    public $email;
    public $phone_no;

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

    public function mount($donorDetail)
    {
        $this->donorDetail = $donorDetail;

        foreach ($donorDetail as $donor) {
            $this->donors[$donor->id] = [
                'name' => $donor->name,
                'email' => true,
                'phone_no' => true,
            ];
        }
    }

    public function donorDetailRender()
    {
        return DonorDetail::paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.settings.notification-setting', [
            'paginatedDonorDetail' => $this->donorDetailRender()
        ]);
    }

    public $sendNotificationModal = false;

    public function openSendNotificationModal()
    {
        $this->sendNotificationModal = true;
    }

    public function closeSendNotificationModal()
    {
        $this->sendNotificationModal = false;
    }

    public function sendNotification()
    {
        foreach ($this->donors as $id => $notifications) {
            $donor = $this->donorDetail->firstWhere('id', $id);
            $emailChecked = $notifications['email'];
            $phoneNoChecked = $notifications['phone_no'];

            if ($emailChecked) {
                //send email
            }
            if ($phoneNoChecked) {
                //send whatsapp
            }
        }
    }

    public $addDonorDetailModal = false;

    public function openDonorDetailModal()
    {
        $this->name = null;
        $this->email = null;
        $this->phone_no = null;

        $this->addDonorDetailModal = true;
    }

    public function closeDonorDetailModal()
    {
        $this->addDonorDetailModal = false;
    }

    public $editDonorDetailModal = false;

    public function openEditDonorDetailsModal($donorDetailId)
    {
        $this->selectedDonor = DonorDetail::find($donorDetailId);

        $this->name = $this->selectedDonor->name;
        $this->email = $this->selectedDonor->email;
        $this->phone_no = $this->selectedDonor->phone_no;

        $this->editDonorDetailModal = true;
    }

    public function closeEditDonorDetailsModal()
    {
        $this->editDonorDetailModal = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
        ],[],[
            'name' => __('ui_text.name'),
        ]);

        try {
            DB::beginTransaction();

            DonorDetail::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone_no' => $this->phone_no,
            ]);

            DB::commit();

            return redirect()->route('notification-settings');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required|string',
        ],[],[
            'name' => __('ui_text.name'),
        ]);

        try {
            DB::beginTransaction();

            $this->selectedDonor->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone_no' => $this->phone_no,
            ]);

            DB::commit();

            $this->alertModalType = 'success';
            $this->alertModalDescription = 'Donor has been saved';

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function deleteDonorDetail($donorDetailId)
    {
        $donorDetail = DonorDetail::find($donorDetailId);

        try {
            DB::beginTransaction();

            $donorDetail->delete();

            DB::commit();

            return redirect()->route('notification-settings');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
