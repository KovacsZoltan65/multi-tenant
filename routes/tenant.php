<?php

use Illuminate\Support\Facades\Route;

/*
 * =======================================================
 * Bérlői felület
 * =======================================================
 * http://company-01.tenant/employees
 * http://company-02.tenant/employees
 */
Route::middleware(['tenant'])->group(function(){
    Route::get('/employees', [App\Http\Controllers\tenant\EmployeeController::class, 'index'])->name('employees.index');

    // További bérlői útvonalak...

});

