<!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Create Users</title>
            </head>
            <body>
                <div class="container">
                    <nav class="navbar navbar-default">
                    </nav>
                </div>
            <div class="panel-body">
                <form action="{{ url('signup') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="user" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="user-name" id="user-name" class="form-control">
                        </div>

                        <label for="user" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" name="user-email" id="user-email" class="form-control">
                        </div>

                        <label for="user" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="text" name="user-password" id="user-password" class="form-control">
                        </div>

                        <label for="user" class="col-sm-3 control-label">Re-enter the password</label>
                        <div class="col-sm-6">
                            <input type="text" name="user-re-password" id="user-re-password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">>
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </body>
        </html>
