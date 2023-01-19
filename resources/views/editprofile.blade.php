<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update User</title>
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

   
    <section class="intro">
        <div class="bg-image h-100">
          <div class="mask d-flex align-items-center h-100">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-7 col-xl-6">
                  <div class="card mask-custom">
                    <div class="card-body p-5 text-white">
      
                      <div class="my-4">
      
                        <h2 class="text-center mb-5">Update user</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
    @if ( Session::has('msgpassed'))
       <h3 class="text-center text-danger">{{ Session::get('msgpassed') }}</h3>
    @else
    <figure class="text-center">
        <p>Update the profile of</p><h3 class="text-danger">{{ $users->name }} / {{ $users->id }}<h5>
        <h4>The system generated user id <i>{{ $users->id }}</i> is for internal use and cannot be modified.</h4>
    </figure>       
    @endif
        <form action="{{ route('update_user', $users->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $users->id }}">
            
            <!-- Name input -->
            <div class="form-outline form-white mb-4">
              <input  value="{{ $users->name }}" name="name" type="text" id="spadeForm1" class="opacity-25 form-control form-control-lg" />
              <label class="form-label" for="spadeForm3">Full Name</label>
            </div>            
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input  value="{{ $users->email }}"name="email" type="text" id="spadeForm2" class="opacity-25 form-control form-control-lg" />
              <label class="form-label" for="spadeForm3">Email address</label>
            </div>
            <!-- Password input -->
            <div class="form-outline form-white mb-4">
              <input readonly value="{{ $users->password }}" name="password" type="password" id="spadeForm3" class="opacity-25 form-control form-control-lg" />
              <label class="form-label" for="spadeForm4">Password (Disabled)</label>
            </div>
            <!-- Text -->
            <div class="form-outline form-white mb-4">
              Gender: {{ $users->gender }} 
             <?php 
             # alternative method demonstration
             // this method is faster than switch case
             if ($users->gender == 'm') {
                echo "(male)";
             }
             elseif ($users->gender == 'f') {
                echo "(female)";
             }
             elseif ($users->gender == 'n') {
                echo "(unspecified/not-disclosed)";
             }
             else {
                echo "(other)";
             }
             
             ?>

            </div>

            <!-- Text -->
            <div class="form-outline form-white mb-4">
              Created at: {{$users->created_at}}
            </div>

            <!-- Text -->
            <div class="form-outline form-white mb-4">
              Updated at: 
            {{$users->updated_at == $users->created_at ? 'Not yet updated' : $users->updated_at }}
            </div>

            <input type="submit" value="Update User Profile" class="opacity-50 form-control form-control-lg">

        </form>
      
                      </div>
     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</body>
</html>