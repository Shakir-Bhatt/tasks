<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function assigned_shifts(){
        return $this->hasMany(AssignedShift::class);
    }

    public function employee_shift(){
        return $this->hasOne(EmployeeShift::class);
    }
}
