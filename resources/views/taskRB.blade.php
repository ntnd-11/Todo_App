{{-- <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Recycle Bin</title>
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
                    Recycle Bin
                </div>
                    <table>
                        <th>
                            <form action="/">
                                <button>Back</button>
                            </form>
                        </th>
                    </table>
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
                                        <form action="{{route('tasks.restore', $task->id)}}">
                                            <button class="float-right submit-button" >Restore</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('tasks.destroy', $task->id)}}">
                                            <button class="float-right submit-button" >Destroy</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$tasks->links()}}

                </div>
            </div>
            </body>
        </html> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Recycle Bin</h1>
                        {{-- <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Product</a> --}}
                    </div>
                    <p><a href="/admin/tasks" class="btn btn-primary">Home</a></p>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr>
                                <td class="align-middle">{{ $task->id }}</td>
                                <td class="align-middle">{{ $task->name }}</td>
                                <td class="align-middle">{{ $task->deadline }}</td>
                                <td class="align-middle">{{ $task->status }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('tasks.restore', ['task'=>$task->id]) }}" type="button" class="btn btn-secondary"><i class="fa fa-reply" aria-hidden="true"></i></a>
                                        <a href="{{ route('tasks.destroy', ['task'=>$task->id]) }}" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
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
    {{ $tasks->links() }}
</x-app-layout>
