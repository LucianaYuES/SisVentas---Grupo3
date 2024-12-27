<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ConsultaVentaController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('clients', ClientController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('ventas', VentaController::class);
Route::get('/consultas', [ConsultaVentaController::class, 'index'])->name('consultas.index');
Route::get('/ventas/{id}/pdf', [VentaController::class, 'generarPDF'])->name('ventas.pdf');

