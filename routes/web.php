<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::resource('users',UserController::class);

Route::get('/', [HomeController::class,'index'])->name('site.index');
Route::post('/auth',[LoginController::class,'auth'])->name('login.auth');
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/logout',[LoginController::class, 'logout'])->name('login.logout');
Route::get('/register',[LoginController::class, 'create'])->name('login.create');