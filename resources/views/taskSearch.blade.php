{{-- <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>List Tasks</title>
            </head>
            <body>
                <div class="container">
                    <nav class="navbar navbar-default">
                    </nav>
                </div>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            <div class="panel panel-default">
                <div>
                    @if (session('success'))
                        <h2>{{session('success')}}</h2>
                    @endif
                </div>
                <div class="panel-heading">
                    List Tasks
                </div>
                <div>
                    <table>
                        <th>
                            <form action="/" class="inline">
                                <button class="float-left submit-button" >Home</button>
                            </form>
                        </th>
                        <th>
                            <form action={{route('tasks.create')}} class="inline">
                                <button class="float-left submit-button" >New Task</button>
                            </form>
                        </th>
                        <th>
                            <form action={{route('tasks.rb')}} class="inline">
                                <button>Recycle Bin</button>
                            </form>
                        </th>
                        <th>
                            <div class="form-group">
                                <form action="{{route('tasks.search')}}" class="input-group">
                                    <input type="text" name="name" placeholder="Nhập tên công việc.." class="form-control">
                                    <select name="status" id="status">
                                        <option value="">Tất cả trạng thái</option>
                                        <option value="Chưa thực hiện">Chưa thực hiện</option>
                                        <option value="Đang thực hiện">Đang thực hiện</option>
                                        <option value="Đã hoàn thành">Đã hoàn thành</option>
                                    </select>
                                    <input type="date" name="deadline" value="" id="task-deadline" class="form-control">
                                    <button type="submit" class="btn-btn-primary">Search</button>
                                </form>

                            </div>
                        </th>
                    </table>
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $task->id }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $task->deadline }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $task->status }}</div>
                                    </td>
                                    <td>
                                        <form action="{{route('tasks.edit', $task->id)}}">
                                            <button class="float-left submit-button" >Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('tasks.destroy', $task->id)}}">
                                            <button class="float-right submit-button" >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$tasks->appends(request()->all())->links()}}

                </div>
            </div>
            </body>
        </html> --}}


<x-app-layout>
    <x-slot name="header">
        @if (Auth::user()->role == 'admin')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Task') }}
        </h2>
        @else
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Task') }}
        </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Task</h1>
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ url('admin/tasks') }}" type="button" class="btn btn-primary">Home</i></a>
                        @else
                            <a href="{{ url('user/tasks') }}" type="button" class="btn btn-primary">Home</i></a>
                        @endif
                        <a href="{{ route('tasks.bin') }}" type="button" class="btn btn-secondary"><i class="fa fa-trash-o"></i></a>
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Product</a>
                    </div>
                    <div>
                        <form action="{{route('tasks.search')}}" class="input-group">
                            <input type="text" name="name" placeholder="Name" class="col-auto">
                            <select name="status" id="status" class="col-auto">
                                <option value="">All</option>
                                <option value="Todo">Todo</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Done">Done</option>
                            </select>
                            <input type="date" name="deadline" id="task-deadline" class="col-auto">
                            <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr>
                                <td class="align-middle">{{ $task->id }}</td>
                                <td class="align-middle">{{ $task->name }}</td>
                                <td class="align-middle">{{ $task->deadline }}</td>
                                <td class="align-middle">{{ $task->status }}</td>
                                {{-- <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('tasks.edit', ['task'=>$task->id]) }}" type="button" class="btn btn-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('tasks.delete', ['task'=>$task->id]) }}" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td> --}}
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Task not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $tasks->appends(request()->all())->links() }}
</x-app-layout>
