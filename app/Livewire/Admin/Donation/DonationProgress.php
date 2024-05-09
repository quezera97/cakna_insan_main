<?php

namespace App\Livewire\Admin\Donation;

use App\Models\DonationDetail;
use App\Models\ProjectDonation;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DonationProgress extends Component
{
    public $donationDetails;

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

    public function mount($donationDetails)
    {
        $this->donationDetails = $donationDetails;
    }

    public function render()
    {
        return view('livewire.admin.donation.donation-progress');
    }

    public function updateDonationProgress($donationDetailId)
    {
        $donationDetail = DonationDetail::find($donationDetailId);

        $some_data = [
            'billCode' => $donationDetail->donation_url,
            'billpaymentStatus' => '1'
        ];

        $client = new Client();

        $response = $client->post('https://toyyibpay.com/index.php/api/getBillTransactions', [
            'form_params' => $some_data,
        ]);

        $bodyContent = $response->getBody()->getContents();
        $info = $response->getHeaders();
        $arrayResult = json_decode($bodyContent, true);

        if(is_null($arrayResult)){
            $this->alertModalType = 'error';
            $this->alertModalDescription = 'Donation URL not found';

            $this->openAlertModal();
        }
        else{
            $totalDonation = 0;

            foreach ($arrayResult as $key => $result) {
                $result['payment'] = number_format($result['billpaymentAmount'], 2) - number_format($result['transactionCharge'], 2);

                $totalDonation += $result['payment'];
            }

            try {
                DB::beginTransaction();

                foreach($arrayResult as $result){
                    ProjectDonation::updateOrCreate([
                        'billpaymentInvoiceNo' => $result['billpaymentInvoiceNo'],
                    ],[
                        'project_id' => $donationDetail->project_id,
                        'donation_amount' => number_format($result['billpaymentAmount'], 2) - number_format($result['transactionCharge'], 2),
                        'billTo' => $result['billTo'],
                        'billEmail' => $result['billEmail'],
                        'billPhone' => $result['billPhone'],
                        'billPaymentDate' => $result['billPaymentDate'],
                    ]);
                }

                DB::commit();

                $this->alertModalType = 'success';
                $this->alertModalDescription = 'Donation progress has been updated';

                $this->openAlertModal();

            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
    }
}
