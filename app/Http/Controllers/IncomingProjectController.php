<?php

namespace App\Http\Controllers;

use App\Models\IncomingProject;
use App\Models\Project;

class IncomingProjectController extends Controller
{
    // kotak kasih insan
    // waqaf sejadah
    // qurban
    // waqaf quran
    // waqaf telekung
    // iftar faqir miskin
    // bantuan pelarian
    // sumbangan baju raya
    // sumbangan beg sekolah

    public function index()
    {
        $incomingProjects = Project::with('projectable')->where('projectable_type', IncomingProject::class)->get();

        return view('project.incoming_project', compact(['incomingProjects']));
    }
}
