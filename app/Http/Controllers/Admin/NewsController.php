<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsDetail;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function addNews()
    {
        return view('admin.news.add');
    }

    public function editNews(NewsDetail $newsDetail)
    {
        return view('admin.news.edit', compact(['newsDetail']));
    }

    public function editNewsImages(NewsDetail $newsDetail)
    {
        return view('admin.news.edit-images', compact(['newsDetail']));
    }
}
