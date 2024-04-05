<?php

namespace App\Http\Controllers;
use App\Http\Requests\SearchTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy("id","asc")->paginate(2);
        return view('taskList', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */



    public function create(StoreTaskRequest $request, Task $task)
    {
        if ($request->user()->cannot('create', $task)) {
            return redirect('user/tasks')->with('error','You cannot create a task');
        }
        return view('taskForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'deadline'=> 'required',
            'status'=> 'required',
        ]);

        Task::create($validated);
        return redirect('/admin/tasks')->with('success', 'Task created successfully!');
    }





    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $tasks = Task::orderBy("id","asc")->paginate(2);
        return view('taskList', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreTaskRequest $request , $id)
    {
        $task = Task::findOrFail($id);
        if ($request->user()->cannot('update', $task)) {
            return redirect('user/tasks')->with('error','You cannot edit this task');
        }

        return view('taskEdit', [
            'task'=> $task
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'name'=> 'required',
            'deadline'=> 'required',
            'status'=> 'required',
        ]);
        // $task->save();
        $task->update($validated);

        return redirect('/admin/tasks')->with('success', 'Task updated successfully!');
    }

    /**
     *
     * Remove the specified resource from storage.
     */



    public function restore(StoreTaskRequest $request, $id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        if ($request->user()->cannot('restore', $task)) {
            return redirect('user/tasks')->with('error','You cannot restore this task');
        }
        $task->restore();
        return redirect('/admin/tasks')->with('success','Task restored successfully');

    }


    public function delete(StoreTaskRequest $request , $id)
    {
        $task = Task::findOrFail($id);
        if ($request->user()->cannot('delete', $task)) {
            return redirect('user/tasks')->with('error','You cannot delete this task');
        }
        $task->delete();
        return redirect('/admin/tasks')->with('success','Task deleted successfully');

    }



    public function destroy(StoreTaskRequest $request , $id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        if ($request->user()->cannot('forceDelete', $task)) {
            return redirect('user/tasks')->with('error','You cannot destroy this task');
        }
        $task->forceDelete();
        return redirect('/admin/tasks/recycle/bin')->with('success','Task destroyed successfully');

    }


    public function search(SearchTaskRequest $request){

        $name = $request->name;
        $status = $request->status;
        $deadline = $request->deadline;
        $tasks = Task::where('name','like',"%".$name."%")
        ->where('status','like',"%".$status."%")
        ->whereDate('deadline',"<=",$deadline)
        ->paginate(2);
        return view('taskSearch', compact('tasks','deadline','status','name'));
    }

}
