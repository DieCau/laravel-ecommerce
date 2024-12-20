<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'login'])->name('admin.login');

Route::get('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');


// Utilizamos el middleware 'admin'
Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
});

