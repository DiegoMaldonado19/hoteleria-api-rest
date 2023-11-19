<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'roomtype';

    protected $fillable = [
        'name',
        'price'
    ];
}
