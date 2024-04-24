<?php

namespace App\Http\Controllers;

use App\Models\JoinUs;
use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('join_us');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JoinUs $joinUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JoinUs $joinUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JoinUs $joinUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JoinUs $joinUs)
    {
        //
    }
}
