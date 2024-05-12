<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GlobalNewsController extends Controller
{
    public function index()
    {
        return view('news.global_news');
    }
}
