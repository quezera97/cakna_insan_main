<?php

namespace App\Http\Controllers;

use App\Models\IncomingProject;
use App\Models\Project;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Project $project)
    {
        $selectedProject = $project ?? null;
        $incomingProject = IncomingProject::get(['id', 'title']);

        return view('donation', compact(['selectedProject', 'incomingProject']));
    }
}
