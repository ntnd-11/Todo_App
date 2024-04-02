<!DOCTYPE html>
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
                    {{ csrf_field() }}
                    {{--REVIEW: refactor--}}
                    {{--Dùng dereactive không cần bọc trong {{}} --}}
                    {{@method_field('PUT')}}
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
                        {{--REVIEW: refactor--}}
                        {{--thẻ select không có thuộc tính value--}}
                        {{--Sử dụng attribute select trong thẻ option để chỉ định giá trị được chọn--}}
                        {{--Xem thêm: https://github.com/NMHiepasd/Hiep-TodoApp/pull/1/files#diff-7c380071c6adc207f1bb7dd55f443b2d79fa1777786659f1f5bda3f12ca22605R65 --}}
                        {{--Và: https://github.com/NMHiepasd/Hiep-TodoApp/pull/1/files#diff-bf20aacaaaeb26d1082b853d95441a47ee586e4f8a5394bfbc6855821aedcea5R25 --}}
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
        </html>
