<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    public function assignedComplaints()
    {
        return $this->hasMany(Complaint::class, 'assigned_officer_id');
    }
}
