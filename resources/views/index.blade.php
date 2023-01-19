<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        html,
        body,
        .intro {
        height: 100%;
        }

        body {
            background: rgb(9,81,121);
            background: linear-gradient(90deg, rgba(9,81,121,1) 0%, rgba(170,170,170,1) 51%, rgba(17,158,186,1) 100%);
        }

        @media (min-width: 550px) and (max-width: 750px) {
        html,
        body,
        .intro {
            height: 750px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
        html,
        body,
        .intro {
            height: 750px;
            }
        }

        .mask-custom {
        backdrop-filter: blur(15px);
        background-color: rgba(255,255,255,.2);
        border-radius: 3em;
        border: 2px solid rgba(255,255,255,.1);
        background-clip: padding-box;
        box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
        }

    </style>
  
</head>
<body>

        <div class="h-100 col-24">
          <div class="mask d-flex align-items-center h-100">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-2 col-md-10 col-lg-7 col-xl-10">
                  <div class="card mask-custom">
                    <div class="card-body p-5 text-white">
      
                      <div class="my-4">

    @if ( Session::has('msgpassed'))
        <h3><font color="red">{{ Session::get('msgpassed') }}</font></h3>
    @endif
    <h2 class="text-center mb-5">List Of All Users</h2>
    <h5 class="text-center mb-5"><a href="{{ route('view_all') }}">Click for API version</a>
    <br/><a href="{{ route('create_user') }}">Click to create new user</a></h5>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <table class="table align-middle text-center opacity-75 table-primary table-bordered table-striped table-striped-columns table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Verified at</th>

                  <th>Creaated at</th>
                  <th>Updated at</th>
                  <th>Delete profile</th>
                </tr>
              </thead>
              <tbody>
            
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}<br/><a href="/api/view_one/{{$user->id}}">JSON API</a></td>
                    <td><a href="/edit_user/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->gender == 'n' ? 'N/A':$user->gender}}</td>
                    <td>{{$user->email_verified_at}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at == $user->created_at ? 'Not yet updated' : $user->updated_at }}</td>
                    <td>
                        <form action="{{ route('delete_user', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="hidden" name="name" value="{{$user->name}}">
                            <input type="hidden" name="email" value="{{$user->email}}">
                            <input type="submit" value="Delete">
                        </form>
                    </td>

                </tr>
                @endforeach
                <tr>
              </tbody>
            </table>
            {!! $users->links() !!} 




                      </div>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    
</body>
</html>