<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\User;
use Illuminate\Http\Request;

class OfficerController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view-officers')->only(['index', 'show']);
        $this->middleware('permission:create-officers')->only(['create', 'store']);
        $this->middleware('permission:edit-officers')->only(['edit', 'update']);
        $this->middleware('permission:delete-officers')->only(['delete']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get officers based on users with the "Officer" role
        $officers = Officer::whereHas('user', function ($query) {
            $query->role('Officer');
        })->with('user')->with('institution')->get();

        return view('officers.view-officers', compact('officers'));
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
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Officer $officer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Officer $officer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officer $officer)
    {
        //
    }
}
