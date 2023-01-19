<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create A User</title>
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
      
                        <h2 class="text-center mb-5">Add new user</h2>
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
                            <p class="text-danger">{{ Session::get('msgpassed') }}</p>
                        @endif
      
                        <form action="{{ route('store_user') }}" method="post">
                            @csrf
                          <!-- 2 column grid layout with text inputs for the first and last names -->
                          <div class="row">
                            <div class="col-12 col-md-10 mb-4">
                              <div class="form-outline form-white">
                                <input name="name" type="text" id="spadeForm1" class="opacity-25 form-control form-control-lg @error('name') is-invalid @enderror" />
                                <label class="form-label" for="spadeForm1">Full name</label>
                              </div>
                            </div>
                            <div class="col-12 col-md-2 mb-4">
                              
                                <select name="gender" class="opacity-25 form-control form-control-lg" id="spadeDrop1">
                                    <option selected disabled="">_</option>
                                    <option class="opacity-25" value="n">Not-disclosed</option>
                                    <option value="f">Female</option>
                                    <option value="m">Male</option>
                                    <option value="t">Third</option>
                                  </select>

                                <label class="form-label" for="spadeDrop1">Gender</label>
                                </div>
                            
                          </div>
      
                          <!-- Email input -->
                          <div class="form-outline form-white mb-4">
                            <input name="email" type="text" id="spadeForm3" class="opacity-25 form-control form-control-lg" />
                            <label class="form-label" for="spadeForm3">Email address</label>
                          </div>
      
                          <!-- Password input -->
                          <div class="form-outline form-white mb-4">
                            <input name="password" type="password" id="spadeForm4" class="opacity-25 form-control form-control-lg" />
                            <label class="form-label" for="spadeForm4">Password</label>
                          </div>
      

      
                          <!-- Submit button -->
                          <button type="submit" class="opacity-50 btn btn-light btn-block mb-4">Create User</button>
      

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