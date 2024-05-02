<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

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

    public function addProject()
    {
        return view('admin.project.add');
    }
}