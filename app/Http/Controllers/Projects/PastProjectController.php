<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\PastProject;
use App\Models\Project;
use Illuminate\Http\Request;

class PastProjectController extends Controller
{
    public function index()
    {
        $pastProjects = Project::with('projectable')->where('projectable_type', PastProject::class)->get();

        return view('project.past_project', compact(['pastProjects']));
    }
}
