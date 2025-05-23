<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
 * =======================================================
 * Központi admin felület
 * =======================================================
 * http://hq.localhost/
 */
Route::domain('hq.tenant')->group(function() {
    Route::get('/', [App\Http\Controllers\hq\AdminController::class, 'index'])->name('admin.index');

    // További admin útvonalak...
});

/*
 * =======================================================
 * Bérlői felület
 * =======================================================
 * http://company_01.tenant/employees
 * http://company_02.tenant/employees
 */
Route::middleware(['tenant'])->group(function(){
    Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');

    // További bérlői útvonalak...
});

require __DIR__.'/auth.php';
