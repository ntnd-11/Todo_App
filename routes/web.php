<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

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
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', function(){
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])
->name('admin.dashboard');


Route::get('tasks', function(){
    $tasks = Task::orderBy('id','asc')
    ->paginate(2);
    return view('taskList', compact('tasks'));
})->name('tasks.list');



Route::resource('tasks',TaskController::class);
Route::get('tasks/rb', function(){
    $tasks = Task::onlyTrashed()
    ->orderBy('id','asc')
    ->paginate(2);
    return view('taskRB', compact('tasks'));
})->name('tasks.rb');


Route::get('tasks/search', [TaskController::class, 'search'])->name('tasks.search');

Route::resource('admin/tasks', TaskController::class);
Route::delete('admin/tasks/{task}', [TaskController::class,'delete'])->name('tasks.delete');
