<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Institution;
use App\Models\Investigation;
use App\Models\Officer;
use Illuminate\Http\Request;

class InvestigationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-investigations')->only(['index', 'show', 'view']);
        $this->middleware('permission:create-investigations')->only(['create', 'store']);
        $this->middleware('permission:edit-investigations')->only(['edit', 'update', 'assignOfficer']);
        $this->middleware('permission:delete-investigations')->only(['delete']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authUser = auth()->user();
        if ($authUser->hasRole('Officer')) {
            $officer = Officer::where('user_id', $authUser->id)->first();
            $investigations = Investigation::where('officer_id', $officer->id)->get();
        } elseif ($authUser->hasRole('Super-Admin')) {
            $investigations = Investigation::all();
        } else {
            dd('Access denied!');
        }

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
    public function assignOfficer(Request $request)
    {
        // Validate the request data
        $request->validate([
            'officer_id' => 'required|exists:officers,id',
            'complaint_id' => 'required|exists:complaints,id',
        ]);

        // Retrieve validated data
        $officer_id = $request->input('officer_id');
        $complaint_id = $request->input('complaint_id');

        // Find the complaint by ID
        $complaint = Complaint::find($complaint_id);

        // Update officer_id if the complaint is found
        if ($complaint) {
            $complaint->update(['assigned_officer_id' => $officer_id, 'status' => 'in_progress']);
            Investigation::create(['officer_id' => $officer_id, 'complaint_id' => $complaint_id]);
            return redirect()->back()->with('success', 'Officer assigned successfully');
        }

        // Return a response or redirect with an error message if needed
        return redirect()->back()->with('error', 'Complaint not found or officer not assigned');
    }

    public function view($id)
    {
        $investigation = Investigation::where('complaint_id', $id)->first();

        return view('investigations.show-investigations', compact('investigation'));
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
        return view('investigations.edit-investigations', compact('investigation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investigation $investigation)
    {
        // Validate the incoming request data
        $request->validate([
            'notes' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        // Update the institution
        $investigation->update([
            'notes' => $request['notes'],
            'status' => $request['status']
        ]);

        if ($request['status'] == 'completed') {
            $status = 'resolved';
        } else {
            $status = 'in_progress';
        }

        // Fetch the complaint associated with the investigation
        $complaint = $investigation->complaint;

        // Update the complaint status
        if ($complaint) {
            $complaint->update([
                'status' => $status
            ]);
        }


        // Redirect back with a success message
        return redirect()->back()->with('success', 'Investigation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investigation $investigation)
    {
        //
    }
}
