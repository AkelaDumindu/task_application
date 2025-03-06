<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get(
//     '/task',
//     [TaskController::class, 'task']
// )->name('task');

Route::post(
    '/task/add',
    [TaskController::class, 'add']
)->name('add');

Route::put(
    '/task/update/{id}',
    [TaskController::class, 'updateTask']
)->name('update');

Route::delete(
    '/task/delete/{id}',
    [TaskController::class, 'deleteTask']
)->name('delete');

Route::get('/', [TaskController::class, 'allTask'])
    ->middleware(['auth', 'verified'])
    ->name('task');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
