<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// Public routes
Route::get('/', [ProdukController::class, 'home'])->name('home');
Route::get('/register', [ProdukController::class, 'register'])->name('register');
Route::post('/register', [ProdukController::class, 'registerStore'])->name('register.store');
Route::get('/login', [ProdukController::class, 'login'])->name('login');
Route::post('/login', [ProdukController::class, 'loginProcess'])->name('login.process');

// Protected routes (perlu middleware auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ProdukController::class, 'dashboard'])->name('dashboard');
    
    // Routes untuk recipes
    Route::get('/recipes', [ProdukController::class, 'recipes'])->name('recipes.index');
    Route::get('/recipes/{id}', [ProdukController::class, 'recipeDetail'])->name('recipes.detail');
    
    // Routes untuk fitur lainnya
    Route::get('/workout', [ProdukController::class, 'workout'])->name('workout');
    Route::get('/timer', [ProdukController::class, 'timer'])->name('timer');
    Route::get('/todolist', [ProdukController::class, 'todolist'])->name('todolist');
    Route::get('/schedule', [ProdukController::class, 'schedule'])->name('schedule');
    
    Route::post('/logout', [ProdukController::class, 'logout'])->name('logout');
});