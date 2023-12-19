<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    // Get the assigned officer
    public function assignedOfficer()
    {
        return $this->belongsTo(Officer::class, 'assigned_officer_id');
    }

    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }
}
