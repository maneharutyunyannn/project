<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Middleware\AdminMiddleware;
use \App\Http\Middleware\ModeratorMiddleware;
use \App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class,"index"])->name("home.index");
Route::get('/posts', [HomeController::class,"postsList"])->name("posts.tag");

Route::post('/home/people', [HomeController::class,"store"])->name("home.store");

Route::middleware('admin')->group(function () {
    Route::get('user/{id}', [HomeController::class,"showUser"])->name("user.show");
    Route::put('/user/{id}', [HomeController::class, 'updateUser'])->name('user.update');
    Route::get('/user/{id}/edit', [HomeController::class, 'editUser'])->name('user.edit');
    Route::delete('/user/{id}', [HomeController::class,"deleteUser"])->name('user.delete');
    Route::post('/store-car', [HomeController::class, 'carStore'])->name('car.store');
});

Route::middleware('moderator')->group(function () {
    Route::get('/user/{id}/edit', [HomeController::class, 'editUser'])->name('user.edit');
});

require __DIR__ . '/auth.php';
