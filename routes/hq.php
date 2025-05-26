<?php

use Illuminate\Support\Facades\Route;

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