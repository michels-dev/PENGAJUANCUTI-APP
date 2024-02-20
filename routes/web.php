<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
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
Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/admintable', [AdminController::class, 'admintable'])->name('admin-table');
    Route::get('/updatecuti', [AdminController::class, 'updatecuti'])->name('update-cuti');

    // Aprroved cuti
        Route::post('/approvalcuti/{id}', [AdminController::class, 'approvalcuti'])->name('approvalcuti');
});

// Route Akses Dashboardd
Route::middleware(['auth'])->name('dashboard.')->prefix('dashboard')->group(function(){
    Route::get('/index', [DashboardController::class, 'index'])->name('index');
    Route::get('/formcuti', [DashboardController::class, 'formcuti'])->name('form-cuti');
    Route::post('/store', [DashboardController::class, 'store'])->name('store');
    Route::get('/onhold', [DashboardController::class, 'onhold'])->name('table-onhold');
    Route::get('/approved', [DashboardController::class, 'approved'])->name('table-approved');
    Route::get('/rejected', [DashboardController::class, 'rejected'])->name('table-rejected');
});

// Route AKses Users
Route::middleware(['auth'])->name('users.')->prefix('users')->group(function(){
    Route::get('/userstable', [UsersController::class, 'userstable'])->name('users-table');
});

// Route Akses Login
Route::name('auth.')->prefix('auth')->group(function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Hak Akses for Admin
Route::middleware(['auth', 'hakakses:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/admintable', [AdminController::class, 'admintable'])->name('admin-table');
});