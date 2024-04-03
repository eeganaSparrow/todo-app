<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\ToDo\IndexController::class);
Route::get('/todo', \App\Http\Controllers\ToDo\IndexController::class)
->name('todo.index');

Route::middleware('auth')->group(function () {
    Route::post('/todo/create', \App\Http\Controllers\ToDo\CreateController::class)
    ->name('todo.create');
    Route::get('/todo/update/{listId}', \App\Http\Controllers\ToDo\Update\IndexController::class)
    ->name('todo.update.index')->where('listId', '[0-9]+');
    Route::put('/todo/update/{listId}', \App\Http\Controllers\ToDo\Update\PutController::class)
    ->name('todo.update.put')->where('listId', '[0-9]+');
    Route::delete('/todo/delete/{listId}', \App\Http\Controllers\ToDo\DeleteController::class)
    ->name('todo.delete');
    Route::post('todo/complete/{listId}', \App\Http\Controllers\ToDo\CompleteController::class)
    ->name('todo.complete');
    Route::post('todo/uncomplete/{listId}', \App\Http\Controllers\ToDo\Complete\UnCompleteController::class)
    ->name('todo.uncomplete');
    Route::get('todo/complete', \App\Http\Controllers\ToDo\Complete\IndexController::class)
    ->name('todo.complete.index'); 
    Route::get('todo/uncomplist', \App\Http\Controllers\ToDo\Display\UnComplistController::class)
    ->name('uncomplist.index');
    Route::get('todo/complist', \App\Http\Controllers\ToDo\Display\ComplistController::class)
    ->name('complist.index');
    Route::delete('todo/user/delete', \App\Http\Controllers\ToDo\User\DeleteController::class)
    ->name('todo.user.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
