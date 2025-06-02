<?php

namespace App\Http\Controllers\tenant;

use App\Models\tenant\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all(); // Az összes dolgozó lekérése
        
        print_r('Employees: <br />');
        
        foreach( $employees as $employee ) {
            print_r("$employee->name ($employee->email)  <br />");
        }
        
        print_r('----------------------' . '<br />');
    }
}
