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



    public function create()
    {
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
        return redirect('/')->with('success', 'Task created successfully!');
    }





    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
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

        return redirect('/')->with('success', 'Task updated successfully!');
    }

    /**
     *
     * Remove the specified resource from storage.
     */



    public function restore($id)
    {
        $task = Task::withTrashed()->findOrFail($id)->restore();
        return redirect('/tasks/rb')->with('success','Task restored successfully');
    }


    public function delete($id)
    {
        $task = Task::findOrFail($id)->delete();
        return redirect('/')->with('success','Task deleted successfully');
    }



    public function destroy($id)
    {
        $task = Task::withTrashed()->findOrFail($id)->forceDelete();
        return redirect('/tasks/rb')->with('success','Task destroyed successfully');
    }


    public function search(SearchTaskRequest $request){

        $name = $request->name;
        $status = $request->status;
        $deadline = $request->deadline;
        $tasks = Task::where('name','like',"%".$name."%")
        ->where('status','like',"%".$status."%")
        ->whereDate('deadline',"<=",$deadline)
        ->paginate(3);
        return view('taskSearch', compact('tasks','deadline','status','name'));

    }

}
