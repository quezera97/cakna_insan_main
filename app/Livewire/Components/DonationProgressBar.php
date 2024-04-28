<?php

namespace App\Livewire\Components;

use App\Models\ProjectDonation;
use Livewire\Component;

class DonationProgressBar extends Component
{
    public $project_id;
    public $project_title;
    public $project_donation_needed;

    public $arrProject = [];

    public function mount($projectId, $projectTitle, $projectDonationNeeded)
    {
        $this->project_id = $projectId;
        $this->project_title = $projectTitle;
        $this->project_donation_needed = $projectDonationNeeded;

        $this->calculateDonation();
    }

    public function calculateDonation()
    {
        $percentageOfDonation = '0%';

        $projectDonation = ProjectDonation::where('project_id', $this->project_id)->sum('donation_amount');

        if (!empty($this->project_donation_needed) && $this->project_donation_needed != 0) {
            $percentageOfDonation = ($projectDonation / $this->project_donation_needed) * 100;

            if($percentageOfDonation > 100){
                $percentageOfDonation = 100;
            }

            $percentageOfDonation = number_format($percentageOfDonation, 2) . '%';
        }

        array_push($this->arrProject, [
            'id' => $this->project_id,
            'title' => $this->project_title,
            'donation_needed' => $this->project_donation_needed,
            'sum_donation' => $projectDonation,
            'percentage' => $percentageOfDonation,
        ]);
    }

    public function render()
    {
        return view('livewire.components.donation-progress-bar');
    }
}

