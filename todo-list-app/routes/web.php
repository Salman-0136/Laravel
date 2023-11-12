<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;
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

Route::get('/create', function () {
    return view('create');
})->name("todo.create");
Route::get('/', function () {
    return view('welcome');
})->name("todo.welcome");
Route::get('/login', function () {
    return view('login');
})->name("todo.login");
Route::get('/dashboard', [todoController::class, 'index'])->name("todo.dashboard");
Route::get('/update/{id}', [todoController::class, 'update'])->name('todo.update');
Route::get('/delete/{id}', [todoController::class, 'delete'])->name('todo.delete');
Route::post('/create', [todoController::class, 'store'])->name('todo.store');
Route::post('/edit', [todoController::class, 'editdata'])->name('todo.editdata');
