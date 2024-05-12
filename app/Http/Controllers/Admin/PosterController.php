<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

class PosterController extends Controller
{
    public function index()
    {
        $projects = Project::with('projectable')->get();

        return view('admin.poster.index', compact(['projects']));
    }
}
