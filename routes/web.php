<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function() {
    return view('auth/signup');
})->name('register');

Route::post('/signup', [UserController::class, 'signup']);


Route::get('/login', function() {
    return view('auth/login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::middleware(['auth'])->group(function() {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/add_employee', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});