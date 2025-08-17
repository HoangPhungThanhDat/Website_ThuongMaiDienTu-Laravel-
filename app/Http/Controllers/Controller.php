<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

abstract class Controller
{
}
Route::middleware('loginMiddleware')->group(function () {
    Route::get('/dashbread', [DashboardController::class, 'index'])->name('admin.dashbread.index');
});
