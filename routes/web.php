<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvidenceController; // Si lo usas

// Rutas Públicas (disponibles para todos)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/ib-cas', function () {
    return view('pages.ib-cas');
})->name('ib-cas');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware('auth')->name('projects.create');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->middleware('auth')->name('activities.create');
Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('projects', ProjectController::class)
        ->parameters(['projects' => 'project'])
        ->except(['index', 'show']);


    Route::resource('activities', ActivityController::class)
        ->parameters(['activities' => 'activity'])
        ->except(['index', 'show']);

    // Rutas adicionales
    Route::post('/projects/{project:slug}/evidences/{evidenceId}/delete', [ProjectController::class, 'deleteEvidence'])
        ->name('projects.evidence.destroy');
});

require __DIR__.'/auth.php';