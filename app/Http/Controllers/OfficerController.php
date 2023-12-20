<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Officer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

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

        $authUser = auth()->user();
        if ($authUser->hasRole('Super-Admin')) {
            // Get officers based on users with the "Officer" role
            $officers = Officer::whereHas('user', function ($query) {
                $query->role('Officer');
            })->with('user')->with('institution')->get();
        } elseif ($authUser->hasRole('Admin')) {
            $institution_id  = Institution::where('user_id', $authUser->id)->pluck('id')->first();
            // Get officers based on users with the "Officer" role
            $officers = Officer::whereHas('user', function ($query) use ($institution_id) {
                $query->role('Officer')->where('institution_id', $institution_id);;
            })->with('user')->with('institution')->get();
        } else {
            dd('Access denied!');
        }

        return view('officers.view-officers', compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('officers.create-officers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'badge_number' => 'required|string|max:50|unique:officers,badge_number'
        ]);

        $institution_id  = Institution::where('user_id', auth()->user()->id)->pluck('id')->first();
        $officerRole = Role::findByName('Officer');
        $officerUser = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make('office835'),
        ]);
        $officerUser->assignRole($officerRole);

        Officer::create([
            'user_id' => $officerUser->id,
            'institution_id' => $institution_id,
            'phone' => $request['phone'],
            'address' => $request['address'],
            'address_2' => $request['address_2'] ?? null,
            'badge_number' => $request['badge_number'],
            'status' => $request['status'] ?? 0,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Officer created successfully');
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
        return view('officers.edit-officers', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Officer $officer)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($officer->user->id),
            ],
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'badge_number' => [
                'required',
                'string',
                'max:50',
                Rule::unique('officers', 'badge_number')->ignore($officer->id),
            ],
            'status' => 'nullable|boolean',
        ]);

        // Update the officer user details
        $officer->user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        // Update the officer details
        $officer->update([
            'phone' => $request['phone'],
            'address' => $request['address'],
            'address_2' => $request['address_2'] ?? null,
            'badge_number' => $request['badge_number'],
            'status' => $request['status'] ?? 0,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Officer data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officer $officer)
    {
        // Delete the associated user
        if ($officer->user) {
            $officer->user->delete();
        }

        // Delete the officer
        $officer->delete();

        // Redirect or return a success response as needed
        return redirect()->route('officer.index')->with('success', 'Officer deleted successfully');
    }
}
