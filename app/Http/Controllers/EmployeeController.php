<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AssignedShift;
use App\Models\Shift;

class EmployeeController extends Controller
{
    public function employees(){

        $employees = Employee::paginate(5);
        return view('employee.index',compact('employees'));

    }

    public function view($id){
        $employee = Employee::with(['assigned_shifts','employee_shift'])
                            ->where('id',$id)
                            ->first();
        $shifts = Shift::get();                    
        return view('employee.view',compact('employee','shifts'));
    }

    public function addShiftToEmployee(Request $reques){

    }

    public function updateEmployeeShift(Request $reques){
        
    }
}
