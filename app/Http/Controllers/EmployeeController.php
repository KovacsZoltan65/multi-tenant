<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all(); // Az összes dolgozó lekérése
        dd($employees->toArray());
        //return view('employees.index', compact('employees'));
    }
}
