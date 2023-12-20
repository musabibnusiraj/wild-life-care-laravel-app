<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'institution_id', 'subject', 'description', 'status', 'assigned_officer_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

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
