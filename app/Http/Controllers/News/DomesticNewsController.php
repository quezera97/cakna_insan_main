<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DomesticNewsController extends Controller
{
    public function index()
    {
        return view('news.domestic_news');
    }
}
