<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
 * =======================================================
 * Központi admin felület
 * =======================================================
 * http://hq.tenant/
 */
Route::domain('hq.tenant')->group(function() {
    Route::get('/', [App\Http\Controllers\hq\AdminController::class, 'index'])->name('admin.index');

    // Tovobbi admin útvonalak...
});

/*
 * =======================================================
 * Bérlői felület
 * http://company-01.tenant/employees
 * http://company-02.tenant/employees
 * =======================================================
 * http://hq.localhost/
 */
Route::middleware(['tenant'])->group(function(){
    Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');

    // További bérlői útvonalak...

});

require __DIR__.'/auth.php';
