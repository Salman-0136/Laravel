<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [blogController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [blogController::class, 'create'])->name('posts.create');
    Route::post('/posts', [blogController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [blogController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [blogController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [blogController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [blogController::class, 'destroy'])->name('posts.destroy');
});