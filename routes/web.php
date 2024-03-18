<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, "index"])->name('index');
    Route::get('/clients', [ClientController::class, "index"])->name('clients');
    Route::get('/projects', [ProjectController::class, "index"])->name('projects');

    Route::delete('/clients/remove/{id}', [ClientController::class,'removeClient'])->name('client.remove');
    Route::get('/clients/add', [ClientController::class,'addClient'])->name('client.add');
    Route::post('/clients/add', [ClientController::class,'addClientPost'])->name('client.add');
    Route::patch('/clients/add', [ClientController::class,'addClientPatch'])->name('client.add');
    Route::get('/clients/edit/{id}', [ClientController::class,'editClient'])->name('client.edit');
    Route::patch('/clients/edit/{id}', [ClientController::class,'editClientPatch'])->name('client.edit');

    Route::delete('/projects/remove/{id}', [ProjectController::class,'removeProject'])->name('project.remove');
    Route::get('/projects/add', [ProjectController::class,'addProject'])->name('project.add');
    Route::post('/projects/add', [ProjectController::class,'addProjectPost'])->name('project.add');
    Route::get('/projects/edit/{id}', [ProjectController::class,'editProject'])->name('project.edit');
    Route::patch('/projects/edit/{id}', [ProjectController::class,'editProjectPatch'])->name('project.edit');

    Route::get('/users', [AdminController::class, 'users'])->name('userList');
    Route::patch("/users/setadmin/{id}", [AdminController::class, "setAdmin"])->name("users.setAdmin");

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
