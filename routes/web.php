<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', function() {
        return view('posts.create');
    })->name('posts.create');

    Route::get('/posts', [PostController::class, 'index'])->name('home');
    Route::post('create', [PostController::class, 'store'])->name('create');
    Route::get('show/{id}', [PostController::class, 'show'])->name('show');
    Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [PostController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [PostController::class, 'destroy'])->name('delete');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
