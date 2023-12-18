<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get users with the 'Officer' role
        $institutions = User::role('Admin')->get();

        return view('institutions.view-institutions', compact('institutions'));
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
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institution $institution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        //
    }
}
