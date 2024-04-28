<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('projectable')->get();

        return view('admin.project.index', compact(['projects']));
    }

    public function editProject(Project $project)
    {
        return view('admin.project.edit', compact(['project']));
    }
}
