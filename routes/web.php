<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

// REVIEW: refactor
// Sao không đưa vào controller?
Route::get('/', function(){
    $tasks = Task::orderBy('id','asc')
    ->paginate((2));
    return view('taskList', compact('tasks'));
});

// REVIEW: refactor
// Cân nhắc dùng Route::resource
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/tasks/{task}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
Route::get('/tasks/{task}/delete', [TaskController::class, 'delete'])->name('tasks.delete');
Route::get('/tasks/{task}/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/search', [TaskController::class, 'search'])->name('tasks.search');

Route::get('/tasks/rb', function(){
    $tasks = Task::onlyTrashed()
    ->orderBy('id','asc')
    ->paginate((2));
    return view('taskRB', compact('tasks'));
})->name('tasks.rb');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';
