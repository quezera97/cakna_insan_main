<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LocationCoordinate;
use Illuminate\Http\Request;

class HelpedLocationSettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.helped-location-index');
    }
}
