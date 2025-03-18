<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserImageController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/', [TaskController::class, 'getAllTask'])->name('task');


    Route::prefix('task')->controller(TaskController::class)->group(function () {
        Route::post('/add', 'addTask')->name('add');
        Route::put('/update/{id}', 'updateTask')->name('update');
        Route::delete('/delete/{id}', 'deleteTask')->name('delete');
        Route::get('/summary-pdf', 'generateSummaryPdf')->name('summary');
        Route::patch('/toggle-complete/{id}', 'handleTaskComplete')->name('toggle');
    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
