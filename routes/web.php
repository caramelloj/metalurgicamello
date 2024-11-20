<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MaterialController;

// App routes

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/clientes', CustomerController::class);

    Route::resource('/trabajos', WorkController::class);

    Route::resource('/materiales', MaterialController::class);

    Route::get('/trabajos', [WorkController::class, 'index'])->name('getall.works');

    Route::post('/buscar-cliente', [CustomerController::class, 'getCustomer'])->name('search.customer');
});

require __DIR__.'/auth.php';
