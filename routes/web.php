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


Route::get('admin/tasks', function(){
    $tasks = Task::orderBy('id','asc')
    ->paginate(2);
    return view('taskList', compact('tasks'));
})->name('tasks.list');

Route::get('admin/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('admin/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('admin/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('admin/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::get('admin/tasks/{task}', [TaskController::class,'delete'])->name('tasks.delete');
Route::get('admin/tasks/{task}/restore', [TaskController::class,'restore'])->name('tasks.restore');
Route::get('admin/tasks/{task}/destroy', [TaskController::class,'destroy'])->name('tasks.destroy');

Route::get('admin/tasks/recycle/bin', function(){
    $tasks = Task::onlyTrashed()
    ->orderBy('id','asc')
    ->paginate(2);
    return view('taskRB', compact('tasks'));
})->name('tasks.bin');


Route::get('admin/tasks/search/tasks', [TaskController::class, 'search'])->name('tasks.search');

Route::get('user/tasks', [TaskController::class, 'show']);

