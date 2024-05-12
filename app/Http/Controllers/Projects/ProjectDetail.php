<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectDetail extends Controller
{
    public function index(Project $project)
    {
        return view('project.project_detail', compact(['project']));
    }
}
