<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonorDetail;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{
    public function index()
    {
        $donorDetail = DonorDetail::get();

        return view('admin.settings.notification-index', compact(['donorDetail']));
    }
}
