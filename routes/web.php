<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    $tasks = Task::orderBy('id','asc')
    ->paginate(3);
    return view('taskList', compact('tasks'));
});

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/tasks/{task}/delete', [TaskController::class, 'delete'])->name('tasks.delete');
Route::get('/tasks/{task}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
Route::get('/tasks/{task}/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');


Route::get('/tasks/rb', function(){
    $tasks = Task::onlyTrashed()
    ->orderBy('id','asc')
    ->paginate(3);
    return view('taskRB', compact('tasks'));
})->name('tasks.rb');

Route::get('tasks/search', [TaskController::class, 'search'])->name('tasks.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
