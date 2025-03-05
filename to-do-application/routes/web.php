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

Route::get(
    '/task/add',
    [TaskController::class, 'add']
)->name('add');

Route::get('/', function () {
    return view('tasks.task');
})->middleware(['auth', 'verified'])->name('task');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
