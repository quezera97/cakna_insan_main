<?php

namespace App\Http\Controllers;

use App\Models\JoinUs;
use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    public function index()
    {
        return view('join_us');
    }
}
