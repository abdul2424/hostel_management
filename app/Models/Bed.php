<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $fillable = [
        'room_id',
        'bed_number'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
