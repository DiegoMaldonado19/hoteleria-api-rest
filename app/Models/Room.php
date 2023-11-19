<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'rate',
        'available',
        'room_type'
    ];

    public function roomType(){
        return $this->belongsTo(RoomType::class, 'id');
    }
}
