<?php

namespace App\Http\Controllers;

use App\Models\IncomingProject;
use App\Models\Project;

class IncomingProjectController extends Controller
{
    public function index()
    {
        $incomingProjects = Project::with('projectable')->where('projectable_type', IncomingProject::class)->paginate(6);

        return view('project.incoming_project', compact(['incomingProjects']));
    }
}
