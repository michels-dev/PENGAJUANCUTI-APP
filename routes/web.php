<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Akses Admin
Route::name('admin.')->prefix('admin')->group(function(){
    Route::get('/formcuti', [AdminController::class, 'formcuti'])->name('form-cuti');
});

// Route Akses Dashboardd
Route::name('dashboard.')->prefix('dashboard')->group(function(){
    Route::get('/index', [DashboardController::class, 'index'])->name('index');
    Route::get('/formcuti', [DashboardController::class, 'formcuti'])->name('form-cuti');
});
