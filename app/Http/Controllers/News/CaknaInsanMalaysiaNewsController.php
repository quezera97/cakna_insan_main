<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsDetail;

class CaknaInsanMalaysiaNewsController extends Controller
{
    public function index()
    {
        $caknaInsanMalaysiaNews = NewsDetail::with(['newsImage'])->where('type_of_news', 'cakna_insan')->orderBy('created_at', 'desc')->paginate(9);

        return view('news.cakna_insan_malaysia_news', compact(['caknaInsanMalaysiaNews']));
    }

    public function caknaNewsDetails(NewsDetail $newsDetail)
    {
        dd($newsDetail);
    }
}
