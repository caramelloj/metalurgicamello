<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DashboardController;

// App routes

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'dashboard_stats'])->name('dashboard');

    Route::resource('/clientes', CustomerController::class);

    Route::resource('/trabajos', WorkController::class);

    Route::get('imprimir-historial/{id?}',[WorkController::class, 'dumpdf'])->name('trabajos.dummpPDF');

    Route::resource('/materiales', MaterialController::class);

    Route::get('/trabajos', [WorkController::class, 'index'])->name('getall.works');

    Route::post('/buscar-cliente', [CustomerController::class, 'getCustomer'])->name('search.customer');
});

require __DIR__.'/auth.php';

