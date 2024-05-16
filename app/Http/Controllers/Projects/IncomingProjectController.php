<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\IncomingProject;
use App\Models\Project;

class IncomingProjectController extends Controller
{
    public function index()
    {
        $incomingProjects = Project::with(['projectable', 'donationDetail'])
                        ->where('projectable_type', IncomingProject::class)
                        ->orderBy('created_at', 'desc')->paginate(9);

        return view('project.incoming_project', compact(['incomingProjects']));
    }
}
