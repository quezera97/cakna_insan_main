<?php

namespace App\Http\Controllers;

use App\Models\DonationDetail;
use App\Models\Project;
use App\Models\ProjectDonation;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DonationController extends Controller
{
    public function index()
    {
        $donationDetails = DonationDetail::with(['project', 'project.projectable'])->orderBy('created_at', 'desc')->get();

        return view('admin.donation.donation_progress', compact(['donationDetails']));
    }
}
