<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectDetail extends Controller
{
    public function index(Project $project)
    {
        return view('project.project_detail', compact(['project']));
    }
}
