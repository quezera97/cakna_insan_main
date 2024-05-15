<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsDetail;
use Illuminate\Http\Request;

class DomesticNewsController extends Controller
{
    public function index()
    {
        $domesticNews = NewsDetail::with(['newsImage'])->where('type_of_news', 'domestic')->orderBy('created_at', 'desc')->paginate(9);

        return view('news.domestic_news', compact(['domesticNews']));
    }
}
