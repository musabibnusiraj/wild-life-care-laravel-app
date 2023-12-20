<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Attachment;
use App\Models\Complaint;
use App\Models\Institution;
use App\Models\Officer;
use Exception;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officers = null;
        $authUser = auth()->user();
        if ($authUser->hasRole('User')) {
            $complaints = Complaint::where('user_id', $authUser->id)->get();
        } elseif ($authUser->hasRole('Officer')) {
            $complaints = Complaint::where('assigned_officer_id', $authUser->id)->get();
        } elseif ($authUser->hasRole('Super-Admin')) {
            $complaints = Complaint::all();
        } elseif ($authUser->hasRole('Admin')) {
            $complaints = Complaint::where('institution_id', optional(Institution::where('user_id', $authUser->id))->value('id'))->get();
            $officers = Officer::where('institution_id', optional(Institution::where('user_id', $authUser->id))->value('id'))->get();
        } else {
            dd('Access denied!');
        }
        return view('complaints.view-complaints', compact('complaints', 'officers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('complaints.create-complaints');
    }

    public function store(Request $request)
    {
        try {
            $userId = auth()->user()->id;

            $complaint = Complaint::create([
                'user_id' => $userId,
                'institution_id' => 1,
                'subject' => $request['title'],
                'description' => $request['description'],
            ]);

            Location::create([
                'complaint_id' => $complaint->id,
                'latitude' => '6.9271',
                'longitude' => '79.8612',
                'address' => $request['address'],
            ]);

            $images = $request->file('images');

            foreach ($images as $image) {
                $path = $image->storeAs(
                    'public/attachment',
                    $image->getClientOriginalName()
                );
                Attachment::create([
                    'complaint_id' => $complaint->id,
                    'file_path' => $path,
                ]);
            }

            return redirect()->route('complaint.index')->with('success', 'Complaint submitted successfully!');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
