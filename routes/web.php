<?php

use App\Http\Controllers\agesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('/about', [agesController::class, 'about'])->name('about');
Route::get('/services', [agesController::class, 'services'])->name('services');

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
