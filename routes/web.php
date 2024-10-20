<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;
Route::resource('users',UserController::class);

Route::get('/', [HomeController::class,'index'])->name('site.index');
Route::post('/auth',[LoginController::class,'auth'])->name('login.auth');
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/logout',[LoginController::class, 'logout'])->name('login.logout');
Route::get('/register',[LoginController::class, 'create'])->name('login.create');
Route::get('/produto/{slug}',[SiteController::class,'details'])->name('site.details');
Route::get('/carrinho', [CarrinhoController::class,'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class,'adicionarCarrinho'])->name('site.addcarrinho');
Route::post('/remover',[CarrinhoController::class,'removeCarrinho'])->name('site.removecarrinho');
Route::get('/limpar', [CarrinhoController::class,'limparCarrinho'])->name('site.limparcarrinho');
