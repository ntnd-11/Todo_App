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
                                    <input type="text" name="name" placeholder="Nhập tên công việc" class="form-control">
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
                    <form action="{{route('register')}}">
                        <button>Register</button>
                    </form>
                    <form action="{{route('login')}}">
                        <button>Login</button>
                    </form>
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
                                        <form action="{{route('tasks.delete', $task->id)}}">
                                            <button class="float-right submit-button" >Delete</button>
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









        {{-- <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
            <!-- App title section -->
            <div class="row m-1 p-4">
                <div class="col">
                    <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                        <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                        <u>My Todo-s</u>
                    </div>
                </div>
            </div>
            <!-- Create todo section -->
            <div class="row m-1 p-3">
                <div class="col col-11 mx-auto">
                    <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                        <div class="col">
                            <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Add new ..">
                        </div>
                        <div class="col-auto m-0 px-2 d-flex align-items-center">
                            <label class="text-secondary my-2 p-0 px-1 view-opt-label due-date-label d-none">Due date not set</label>
                            <i class="fa fa-calendar my-2 px-1 text-primary btn due-date-button" data-toggle="tooltip" data-placement="bottom" title="Set a Due date"></i>
                            <i class="fa fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button d-none" data-toggle="tooltip" data-placement="bottom" title="Clear Due date"></i>
                        </div>
                        <div class="col-auto px-0 mx-0 mr-2">
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 mx-4 border-black-25 border-bottom"></div>
            <!-- View options section -->
            <div class="row m-1 p-3 px-5 justify-content-end">
                <div class="col-auto d-flex align-items-center">
                    <label class="text-secondary my-2 pr-2 view-opt-label">Filter</label>
                    <select class="custom-select custom-select-sm btn my-2">
                        <option value="all" selected>All</option>
                        <option value="completed">Completed</option>
                        <option value="active">Active</option>
                        <option value="has-due-date">Has due date</option>
                    </select>
                </div>
                <div class="col-auto d-flex align-items-center px-1 pr-3">
                    <label class="text-secondary my-2 pr-2 view-opt-label">Sort</label>
                    <select class="custom-select custom-select-sm btn my-2">
                        <option value="added-date-asc" selected>Added date</option>
                        <option value="due-date-desc">Due date</option>
                    </select>
                    <i class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Ascending"></i>
                    <i class="fa fa fa-sort-amount-desc text-info btn mx-0 px-0 pl-1 d-none" data-toggle="tooltip" data-placement="bottom" title="Descending"></i>
                </div>
            </div>
            <!-- Todo list section -->
            <div class="row mx-1 px-5 pb-3 w-80">
                <div class="col mx-auto">
                    <!-- Todo Item 1 -->
                    <div class="row px-3 align-items-center todo-item rounded">
                        <div class="col-auto m-1 p-0 d-flex align-items-center">
                            <h2 class="m-0 p-0">
                                <i class="fa fa-square-o text-primary btn m-0 p-0 d-none" data-toggle="tooltip" data-placement="bottom" title="Mark as complete"></i>
                                <i class="fa fa-check-square-o text-primary btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Mark as todo"></i>
                            </h2>
                        </div>
                        <div class="col px-1 m-1 d-flex align-items-center">
                            <input type="text" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly value="Buy groceries for next week" title="Buy groceries for next week" />
                            <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-3 d-none" value="Buy groceries for next week" />
                        </div>
                        <div class="col-auto m-1 p-0 px-3 d-none">
                        </div>
                        <div class="col-auto m-1 p-0 todo-actions">
                            <div class="row d-flex align-items-center justify-content-end">
                                <h5 class="m-0 p-0 px-2">
                                    <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                </h5>
                                <h5 class="m-0 p-0 px-2">
                                    <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                </h5>
                            </div>
                            <div class="row todo-created-info">
                                <div class="col-auto d-flex align-items-center pr-2">
                                    <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50">28th Jun 2020</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Todo Item 2 -->
                    <div class="row px-3 align-items-center todo-item rounded">
                        <div class="col-auto m-1 p-0 d-flex align-items-center">
                            <h2 class="m-0 p-0">
                                <i class="fa fa-square-o text-primary btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Mark as complete"></i>
                                <i class="fa fa-check-square-o text-primary btn m-0 p-0 d-none" data-toggle="tooltip" data-placement="bottom" title="Mark as todo"></i>
                            </h2>
                        </div>
                        <div class="col px-1 m-1 d-flex align-items-center">
                            <input type="text" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly value="Renew car insurance" title="Renew car insurance" />
                            <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-3 d-none" value="Renew car insurance" />
                        </div>
                        <div class="col-auto m-1 p-0 px-3">
                            <div class="row">
                                <div class="col-auto d-flex align-items-center rounded bg-white border border-warning">
                                    <i class="fa fa-hourglass-2 my-2 px-2 text-warning btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Due on date"></i>
                                    <h6 class="text my-2 pr-2">28th Jun 2020</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto m-1 p-0 todo-actions">
                            <div class="row d-flex align-items-center justify-content-end">
                                <h5 class="m-0 p-0 px-2">
                                    <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                </h5>
                                <h5 class="m-0 p-0 px-2">
                                    <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                </h5>
                            </div>
                            <div class="row todo-created-info">
                                <div class="col-auto d-flex align-items-center pr-2">
                                    <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50">28th Jun 2020</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Todo Item 3 -->
                    <div class="row px-3 align-items-center todo-item editing rounded">
                        <div class="col-auto m-1 p-0 d-flex align-items-center">
                            <h2 class="m-0 p-0">
                                <i class="fa fa-square-o text-primary btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Mark as complete"></i>
                                <i class="fa fa-check-square-o text-primary btn m-0 p-0 d-none" data-toggle="tooltip" data-placement="bottom" title="Mark as todo"></i>
                            </h2>
                        </div>
                        <div class="col px-1 m-1 d-flex align-items-center">
                            <input type="text" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3 d-none" readonly value="Sign up for online course" title="Sign up for online course" />
                            <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-3" value="Sign up for online course" />
                        </div>
                        <div class="col-auto m-1 p-0 px-3 d-none">
                        </div>
                        <div class="col-auto m-1 p-0 todo-actions">
                            <div class="row d-flex align-items-center justify-content-end">
                                <h5 class="m-0 p-0 px-2 edit-icon">
                                    <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                </h5>
                                <h5 class="m-0 p-0 px-2">
                                    <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                </h5>
                            </div>
                            <div class="row todo-created-info">
                                <div class="col-auto d-flex align-items-center pr-2">
                                    <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50">28th Jun 2020</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

{{-- @extends('layouts.app')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /> --}}
{{-- <link rel="stylesheet" href="/public/build/assets/app-C7ePKgO.css"> --}}

{{-- <div class="container">
<div class="col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Task Details</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <tbody><tr>
              <th class="text-center">
                <div class="custom-checkbox custom-checkbox-table custom-control">
                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                  <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                </div>
              </th>
              <th>Task Name</th>
              <th>Progress</th>
              <th>Due Date</th>
              <th>Action</th>
            </tr>
            <tr>
              <td class="p-0 text-center">
                <div class="custom-checkbox custom-control">
                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                  <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                </div>
              </td>
              <td>Ecommerce website</td>
              <td class="align-middle">
                <div class="progress" data-height="4" data-toggle="tooltip" title="" data-original-title="100%" style="height: 4px;">
                  <div class="progress-bar bg-success" data-width="100" style="width: 100px;"></div>
                </div>
              </td>
              <td>2018-01-20</td>
              <td>
                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <tr>
              <td class="p-0 text-center">
                <div class="custom-checkbox custom-control">
                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                  <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                </div>
              </td>
              <td>Android App</td>
              <td class="align-middle">
                <div class="progress" data-height="4" data-toggle="tooltip" title="" data-original-title="30%" style="height: 4px;">
                  <div class="progress-bar bg-orange" data-width="30" style="width: 30px;"></div>
                </div>
              </td>
              <td>2018-09-11</td>
              <td>
                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <tr>
              <td class="p-0 text-center">
                <div class="custom-checkbox custom-control">
                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-5">
                  <label for="checkbox-5" class="custom-control-label">&nbsp;</label>
                </div>
              </td>
              <td>Logo Design</td>
              <td class="align-middle">
                <div class="progress" data-height="4" data-toggle="tooltip" title="" data-original-title="67%" style="height: 4px;">
                  <div class="progress-bar bg-purple" data-width="67" style="width: 67px;"></div>
                </div>
              </td>
              <td>2018-04-12</td>
              <td>
                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <tr>
              <td class="p-0 text-center">
                <div class="custom-checkbox custom-control">
                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-6">
                  <label for="checkbox-6" class="custom-control-label">&nbsp;</label>
                </div>
              </td>
              <td>Java Project</td>
              <td class="align-middle">
                <div class="progress" data-height="4" data-toggle="tooltip" title="" data-original-title="43%" style="height: 4px;">
                  <div class="progress-bar bg-success" data-width="43" style="width: 43px;"></div>
                </div>
              </td>
              <td>2018-01-20</td>
              <td>
                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody></table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection --}}



{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TodoList</title>


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg>
                        </div>
                        @if (Route::has('login'))
                        @endif
                    </header>
                    <div>
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
                                    <input type="text" name="name" placeholder="Nhập tên công việc" class="form-control">
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
                                        <form action="{{route('tasks.delete', $task->id)}}">
                                            <button class="float-right submit-button" >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$tasks->links()}}

                </div>
            </div>
                    </div>

                    <footer class="py-16 text-center text-sm text-black">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
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
                        <a href="{{ route('tasks.bin') }}" type="button" class="btn btn-secondary"><i class="fa fa-trash-o"></i></a>
                        <a href="{{ route('tasks.create') }}" type="button" class="btn btn-primary">Add Product</a>
                    </div>
                    <form action="{{route('tasks.search')}}" class="input-group">
                        <input type="text" name="name" placeholder="Name" class="col-auto">
                        <select name="status" id="task-status" class="col-auto">
                            <option value="">All</option>
                            <option value="Todo">Todo</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Done">Done</option>
                        </select>
                        <input type="date" name="deadline" value="" id="task-deadline" class="col-auto">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
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
                                        <a href="{{ route('tasks.edit', ['task'=>$task->id]) }}" type="button" class="btn btn-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('tasks.delete', ['task'=>$task->id]) }}" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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


