<!DOCTYPE html>
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

                    {{$tasks->appends(request()->all())->onEachSide(1)->links()}}

                </div>
            </div>
            </body>
        </html>
