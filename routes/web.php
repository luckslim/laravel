<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;



Route::get('/', [HomeController::class,'index']);
Route::post('/auth',[LoginController::class,'auth'])->name('login.auth');
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');