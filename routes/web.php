<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    Route::get('/',[HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::resource('invoices', InvoiceController::class)->except(['destroy']);
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->middleware('role:admin')->name('invoices.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::get('/users/{user}/editAdmin', [UserController::class, 'editAdmin'])->name('users.editAdmin');
    Route::put('/users/{user}/updateAdmin', [UserController::class, 'updateAdmin'])->name('users.updateAdmin');
    Route::resource('users', UserController::class)->except(['edit', 'update']);
});
