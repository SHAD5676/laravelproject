<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Default User/General Dashboard
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Login, Logout, & Dashboard
Route::middleware('guest:admin')->prefix('admin')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'store']);
});

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'destroy'])->name('admin.logout');
    Route::view('/dashboard', 'backend.admin_dashboard')->name('admin.dashboard');

    
    Route::resource('employee', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);
});

// Manager Login, Logout, & Dashboard
Route::middleware('guest:manager')->prefix('manager')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\Manager\LoginController::class, 'create'])->name('manager.login');
    Route::post('login', [App\Http\Controllers\Auth\Manager\LoginController::class, 'store']);
});

Route::middleware('auth:manager')->prefix('manager')->group(function () {
    Route::post('logout', [App\Http\Controllers\Auth\Manager\LoginController::class, 'destroy'])->name('manager.logout');
    Route::view('/dashboard', 'backend.manager_dashboard')->name('manager.dashboard');
});

// Employee Login, Logout, & Dashboard
Route::middleware('guest:employee')->prefix('employee')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\Employee\LoginController::class, 'create'])->name('employee.login');
    Route::post('login', [App\Http\Controllers\Auth\Employee\LoginController::class, 'store']);
});

Route::middleware('auth:employee')->prefix('employee')->group(function () {
    Route::post('logout', [App\Http\Controllers\Auth\Employee\LoginController::class, 'destroy'])->name('employee.logout');
    Route::view('/dashboard', 'backend.employee_dashboard')->name('employee.dashboard');
});

require __DIR__ . '/auth.php';