{{-- <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Edit Tasks</title>
            </head>
            <body>
                <div class="container">
                    <nav class="navbar navbar-default">
                    </nav>
                </div>
            <div class="panel-body">
                <form action="{{route('tasks.update', $task->id)}}" method="POST" class="col-sm-offset-3 col-sm-6">
                    {{csrf_field()}}
                    @method_field('PUT')
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="{{$task->name}}" class="form-control">
                        </div>

                        <label for="task" class="col-sm-3 control-label">Deadline</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" name="deadline" value="{{$task->deadline}}" class="form-control">
                        </div>

                        <label for="task" class="col-sm-3 control-label">Status</label>
                        <div>
                        <select class="col-sm-6" name="status" class="form-control" value="{{$task->status}}">
                            @if ($task->status=='Đã hoàn thành')
                                <option value="Đã hoàn thành">Đã hoàn thành</option>
                                <option value="Đang thực hiện">Đang thực hiện</option>
                                <option value="Chưa thực hiện">Chưa thực hiện</option>
                            @elseif ($task->status=='Đang thực hiện')
                                <option value="Đang thực hiện">Đang thực hiện</option>
                                <option value="Đã hoàn thành">Đã hoàn thành</option>
                                <option value="Chưa thực hiện">Chưa thực hiện</option>
                            @else
                                <option value="Chưa thực hiện">Chưa thực hiện</option>
                                <option value="Đang thực hiện">Đang thực hiện</option>
                                <option value="Đã hoàn thành">Đã hoàn thành</option>
                            @endif
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Save
                            </button>
                    </div>
                </form>
            </div>
            </body>
        </html> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Update Task</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <p><a href="/admin/tasks" class="btn btn-primary">Back</a></p>

                    <form action="{{ route('tasks.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="name" class="form-control" value="{{$task->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="datetime-local" name="deadline" class="form-control" value="{{$task->deadline}}">
                                @error('deadline')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cars">Status</label>
                            <select name="status" id="status">
                                <option value="Todo">Todo</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
