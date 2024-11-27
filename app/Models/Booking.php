<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [

        'user_id',
        'room_id',
        'bed_id',
        'start_date',
        'end_date',
        'status',
        'price'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }
}
