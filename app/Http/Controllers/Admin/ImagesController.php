<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
class ImagesController extends Controller
{
    public function index()
    {
        $projects = Project::with(['projectable'])->get();

        return view('admin.images.index', compact(['projects']));
    }

    public function editImages(Project $project)
    {
        return view('admin.images.edit', compact(['project']));
    }
}
