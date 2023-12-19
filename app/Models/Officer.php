<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = ['institution_id', 'user_id', 'badge_number', 'admin_id', 'address', 'address_2', 'phone', 'status'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    // Cfficer can be assigned to multiple complaints
    public function assignedComplaints()
    {
        return $this->hasMany(Complaint::class, 'assigned_officer_id');
    }
}
