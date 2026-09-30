<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\EnsenyamentController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('alumne', AlumneController::class)->middleware('auth');
Route::resource('centre', CentreController::class)->middleware('auth');
Route::resource('ensenyament', EnsenyamentController::class)->middleware('auth');