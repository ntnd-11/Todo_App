<?php

namespace App\Http\Controllers;
use App\Http\Requests\SearchTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
class TaskController extends Controller
{
    // REVIEW: missing
    // Không dùng?
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $task = DB::table('tasks')->simplePaginate(2);
        // return view('taskList', ['tasks'=> $task]);
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
        // REVIEW: missing
        // Bên giao diện không có chỗ hiển thị lỗi validate?
        $validated = $request->validate([
            // REVIEW: security
            // Xem tại https://github.com/NMHiepasd/Hiep-TodoApp/pull/1/files#diff-fb950efa26828f1cd0cf1b5b373c2a14a99a8e6cb78d2a6ec599115893bbcf59R25
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
        // REVIEW: missing
        // Bên giao diện không có chỗ hiển thị lỗi validate?
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
        // REVIEW: missing
        // Bên giao diện không có chỗ hiển thị flash message?
        $task = Task::withTrashed()->findOrFail($id)->restore();
        return redirect('/tasks/rb')->with('success','Task restored successfully');
    }


    public function delete($id)
    {
        // REVIEW: missing
        // Bên giao diện không có chỗ hiển thị flash message?
        $task = Task::findOrFail($id)->delete();
        return redirect('/')->with('success','Task deleted successfully');
    }



    public function destroy($id)
    {
        // REVIEW: missing
        // Bên giao diện không có chỗ hiển thị flash message?
        $task = Task::withTrashed()->findOrFail($id)->forceDelete();
        return redirect('/tasks/rb')->with('success','Task destroyed successfully');
    }


    public function search(SearchTaskRequest $request){

        // REVIEW: refactor
        // Giao diện, chức năng giống trang index?
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
