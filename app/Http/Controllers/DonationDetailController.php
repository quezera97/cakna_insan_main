<?php

namespace App\Http\Controllers;

class DonationDetailController extends Controller
{
    public function index()
    {
        return view('admin.donation.donation_detail');
    }
}
