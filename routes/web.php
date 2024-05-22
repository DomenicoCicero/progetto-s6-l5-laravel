<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/projects/create',       [ProjectController::class, 'create'])->name('projects.create');
    Route::get('/projects/{id}/edit',    [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects',             [ProjectController::class, 'store'])->name('projects.store');
    Route::put('/projects/{id}',         [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}',      [ProjectController::class, 'destroy'])->name('projects.destroy');

});

Route::get('/projects',            [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}',       [ProjectController::class, 'show'])->name('projects.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {
});


require __DIR__.'/auth.php';
