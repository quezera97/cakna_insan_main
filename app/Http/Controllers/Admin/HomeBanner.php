<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerJumbotron;
use Illuminate\Http\Request;

class HomeBanner extends Controller
{
    public function index()
    {
        return view('admin.banner.index');
    }
}
