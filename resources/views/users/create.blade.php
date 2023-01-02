<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.min.css" />
    <style>
        .sidenav {
            height: 1000px;
        }
        .container-fluid{
            padding-left: 0rem;
            padding-right: 0rem;
            overflow: hidden;
        }
        ul {
            list-style: none;
        }
        ul li {
            padding-top: 15px;
            padding-bottom: 15px;
            padding-left: 8px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row no-gutters">
        <div class="col-md-2">
            <div class="sidenav bg-dark">
                <h3 class="pt-3 ml-4 text-white">Admin Panel</h3>
                <hr />
                <ul>
                    <li>
                        <span><i class="fa fa-dashboard pr-2"></i>Dashboard</span>
                    </li>
                    <hr class="ml-n5"/>
                    <li>
                        <a href="{{URL::to('/users')}}" style="text-decoration:none">
                            <span><i class="fa fa-user pr-2"></i>Users</span>
                        </a>
                    </li>
                    <hr class="ml-n5"/>
                    <li>
                        <span><i class="fa fa-shopping-cart pr-2"></i>Orders</span>
                    </li>
                    <hr class="ml-n5"/>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="height:67px"> </nav>
            <div class="row">
                <div class="col-md-12 pt-3 pl-5 pr-5 pb-5">
                    <h3>Create User</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="{{ URL::to('users') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="mobile_phone">Mobile Phone:</label>
                            <input type="number" name="mobile_phone" class="form-control" placeholder="Enter Phone" id="mobile_phone">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password">
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password" id="confirm_password">
                        </div>

                        <button type="submit" class="btn btn-success">Create</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>