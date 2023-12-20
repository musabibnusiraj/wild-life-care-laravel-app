<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Attachment;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::all();
        return view('complaints.view-complaints', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('complaints.create-complaints');
    }

    public function store(Request $request)
    {
        try {
            $userId = auth()->user()->id;

            $userId = auth()->user()->id;

            $complaint = Complaint::create([
                'user_id' => $userId,
                'institution_id' => 1,
                'subject' => $request['title'],
                'description' => $request['description'],
            ]);

            $location = Location::create([
                'complaint_id' => $complaint->id,
                'latitude' => '6.9271',
                'longitude' => '79.8612',
                'address' => $request['address'],
            ]);

            $images = $request->file('images');

            foreach ($images as $image) {
                $path = $image->storeAs(
                    'attachment',
                    $image->getClientOriginalName()
                );
                Attachment::create([
                    'complaint_id' => $complaint->id,
                    'file_path' => $path,
                ]);
            }

        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->route('complaint.index')->with('success', 'Complaint submitted successfully!');
    }
}