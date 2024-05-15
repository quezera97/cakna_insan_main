<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerJumbotron;
use Illuminate\Http\Request;

class HomeBanner extends Controller
{
    public function index()
    {
        $bannerJumbotron = BannerJumbotron::orderBy('created_at', 'desc')->get();

        return view('admin.banner.index', compact(['bannerJumbotron']));
    }
}
