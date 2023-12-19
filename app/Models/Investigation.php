<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;

    protected $fillable = ['officer_id', 'complaint_id', 'notes', 'status'];

    // Get the officer associated with the investigation
    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }

    //Get the complaint associated with the investigation
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
