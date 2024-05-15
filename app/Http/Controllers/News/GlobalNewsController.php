<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsDetail;
use Illuminate\Http\Request;

class GlobalNewsController extends Controller
{
    public function index()
    {
        $globalNews = NewsDetail::with(['newsImage'])->where('type_of_news', 'global')->orderBy('created_at', 'desc')->paginate(9);

        return view('news.global_news', compact(['globalNews']));
    }
}
