<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'first_name',
        'last_name',
        'employee_role_id',
        'shift_start_time',
        'shift_end_time'
    ];

    public function employeeRole(){
        return $this->belongsTo(EmployeeRole::class, 'id');
    }

}
