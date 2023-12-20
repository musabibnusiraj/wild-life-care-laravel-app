<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class InstitutionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-institutions')->only(['index', 'show']);
        $this->middleware('permission:create-institutions')->only(['create', 'store']);
        $this->middleware('permission:edit-institutions')->only(['edit', 'update']);
        $this->middleware('permission:delete-institutions')->only(['delete']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get institutions based on users with the "User" role
        $institutions = Institution::whereHas('user', function ($query) {
            $query->role('Admin');
        })->with('user')->get();

        return view('institutions.view-institutions', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = ['colombo', 'kandy', 'galle', 'jaffna', 'anuradhapura', 'trincomalee', 'matara', 'puttalam']; // Add more branches

        return view('institutions.create-institutions', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'instituion_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'branch' => 'required|string|max:255',
        ]);

        $institutionRole = Role::findByName('Admin');
        $institutionUser = \App\Models\User::factory()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $institutionUser->assignRole($institutionRole);

        Institution::create([
            'user_id' => $institutionUser->id,
            'type' => $request['type'],
            'name' => $request['instituion_name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'address_2' =>  $request['address_2'] ?? null,
            'branch' => $request['branch']
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Institution created successfully');
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
        $branches = ['colombo', 'kandy', 'galle', 'jaffna', 'anuradhapura', 'trincomalee', 'matara', 'puttalam']; // Add more branches
        return view('institutions.edit-institutions', compact('institution', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institution $institution)
    {
        // Validate the incoming request data
        $request->validate([
            'instituion_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $institution->user_id, // Exclude the current user from unique check
            'password' => 'nullable|string|min:6|confirmed',
            'type' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'branch' => 'required|string|max:255',
        ]);

        // Update the user associated with the institution
        $institution->user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'] ? Hash::make($request['password']) : $institution->user->password,
        ]);

        // Update the institution
        $institution->update([
            'type' => $request['type'],
            'name' => $request['instituion_name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'address_2' => $request['address_2'],
            'branch' => $request['branch'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Institution updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        // Delete the associated user
        if ($institution->user) {
            $institution->user->delete();
        }

        // Delete the institution
        $institution->delete();

        // Redirect or return a success response as needed
        return redirect()->route('institution.index')->with('success', 'Institution deleted successfully');
    }
}
