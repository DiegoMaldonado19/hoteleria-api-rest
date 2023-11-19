<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = [
        'employee_id',
        'transaction_type',
        'transaction_date',
        'amount'
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function transactionType() {
        return $this->belongsTo(transactionType::class);
    }

    protected $casts = [
        'transaction_date' => 'datetime'
    ];
}
