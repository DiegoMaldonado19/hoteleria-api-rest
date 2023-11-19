<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'check_in_date',
        'check_out_date',
        'created_by_customer',
        'transaction_id',
        'employee_id',
        'user_id',
        'room_id'
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
    public function room(){
        return $this->belongsTo(Room::class, 'id');
    }

    protected $casts = [
        'check_in_date' => 'datetime',
        'check_out_date' => 'datetime'
    ];
}
