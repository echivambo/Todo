<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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
    
    Route::get('/todo-list', [TodoController::class, 'index'])->name('todo.index');
    Route::get('/todo-list/create', [TodoController::class, 'create'])->name('todo.create');
    Route::post('/todo-list', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/todo-list/{todo}', [TodoController::class, 'show'])->name('todo.show');
    Route::get('/todo-list/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::put('/todo-list/{todo}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todo-list/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
});

require __DIR__.'/auth.php';
