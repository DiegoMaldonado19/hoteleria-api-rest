<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'employee_id',
        'task_description',
        'task_date',
        'task_completed'
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
