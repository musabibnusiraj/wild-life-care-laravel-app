<?php

namespace App\Http\Controllers;

use App\Models\Investigation;
use Illuminate\Http\Request;

class InvestigationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-investigations')->only(['index', 'show']);
        $this->middleware('permission:create-investigations')->only(['create', 'store']);
        $this->middleware('permission:edit-investigations')->only(['edit', 'update']);
        $this->middleware('permission:delete-investigations')->only(['delete']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investigations = Investigation::where('')->get();

        // $authUser = auth()->user();
        // if ($authUser->hasRole('Super-Admin')) {
        //     // Get officers based on users with the "Officer" role
        //     $officers = Officer::whereHas('user', function ($query) {
        //         $query->role('Officer');
        //     })->with('user')->with('institution')->get();
        // } elseif ($authUser->hasRole('Admin')) {
        //     $institution_id  = Institution::where('user_id', $authUser->id)->pluck('id')->first();
        //     // Get officers based on users with the "Officer" role
        //     $officers = Officer::whereHas('user', function ($query) use ($institution_id) {
        //         $query->role('Officer')->where('institution_id', $institution_id);;
        //     })->with('user')->with('institution')->get();
        // } else {
        //     dd('Access denied!');
        // }

        return view('investigations.view-investigations', compact('investigations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('investigations.create-investigations');
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
    public function show(Investigation $investigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investigation $investigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investigation $investigation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investigation $investigation)
    {
        //
    }
}
