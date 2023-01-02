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
                    <h3>
                        All Users
                        <a href="{{URL::to('/users/create')}}">
                            <button class="btn btn-primary btn-sm float-right">Create User</button>
                        </a>
                    </h3>
                    @if (Session::has('message'))
                        <div class="alert alert-info mt-3 mb-3">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>User ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Mobile Phone</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->mobile_phone }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <a class="btn btn-small btn-info btn-sm" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit User</a>
                                            </div>
                                            <div class="col-md-7">
                                                <form action="{{ URL::to('users',$value->id) }}" method="Post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $users->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>