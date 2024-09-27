<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

// Public Routes
Route::get('/', [TodoController::class, 'index'])->name('todos.index');

// Authentication Routes
Auth::routes();

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::resource('todos', TodoController::class)->except(['index']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});