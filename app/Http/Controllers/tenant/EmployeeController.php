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
        dd($employees->toArray());
        //return view('employees.index', compact('employees'));
    }
}
