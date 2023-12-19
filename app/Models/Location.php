<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['complaint_id', 'latitude', 'longitude', 'address'];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
