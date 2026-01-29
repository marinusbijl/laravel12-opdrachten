<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Open as Open;
use \App\Http\Controllers\Admin as Admin;

Route::get('/', function () {
    return view('layouts.layoutpublic');
})->name('home');

Route::get('/projects', [Open\ProjectController::class, 'index'])->name('open.projects.index');

Route::get('/admin', function () {
    return view('layouts.layoutadmin');
})->name('admin');

Route::resource('/admin/projects', Admin\ProjectController::class);

Route::prefix('admin')->group(function () {
    // Projects
    Route::get(
        'projects/{project}/delete',
        [Admin\ProjectController::class, 'delete']
    )->name('projects.delete');

    Route::resource('projects', Admin\ProjectController::class);

    // Tasks
    Route::get(
        'tasks/{task}/delete',
        [Admin\TaskController::class, 'delete']
    )->name('tasks.delete');

    Route::resource('tasks', Admin\TaskController::class);
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['role:student|teacher|admin'])->group(function () {
    Route::get('/admin/projects/{project}/delete', [Admin\ProjectController::class, 'delete'])
        ->name('projects.delete');
    Route::resource('/admin/projects', Admin\ProjectController::class);

    Route::get('/admin/tasks/{task}/delete', [Admin\TaskController::class, 'delete'])
        ->name('tasks.delete');
    Route::resource('/admin/tasks', Admin\TaskController::class);

    Route::get('/dashboard/', fn() => view('dashboard'))
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
