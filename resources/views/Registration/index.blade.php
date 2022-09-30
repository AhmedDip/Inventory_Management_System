<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-6 d-none d-lg-block">
                    <img src="{{ asset('template/img/login.gif') }}" alt="" height="550px">
                  
                </div>
                    <div class="col-lg-6">
                        <div class="p-4">
                            <div class="text-center">
                              <div class="text-center">
                                                        
                                <img src="{{asset('template/img/main_logo.png')}}" alt="" width="50%">
                            </div>
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{route('registration.store')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-4 mb-sm-1">
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                            placeholder="Name">
                                            <div class="small text-danger">
                                                @error('name')
                                                    *{{$message}}
                                                @enderror
                                            </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control "name="email" value="{{old('email')}}"
                                            placeholder="Email">
                                            <div class="small text-danger">
                                                @error('email')
                                                    *{{$message}}
                                                @enderror
                                            </div>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-4 mb-sm-1">
                                        <input type="password" class="form-control"
                                        name="password" value="{{old('password')}}" placeholder="Password">
                                        <div class="small text-danger">
                                            @error('password')
                                                *{{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" value="{{old('password')}}" name="password_confirmation"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                            <div class="small text-danger">
                                                @error('password')
                                                    *{{$message}}
                                                @enderror
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-4 mb-sm-1">
                                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}"
                                            placeholder="Phone">
                                            <div class="small text-danger">
                                                @error('phone')
                                                    *{{$message}}
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="group_id" id="group"  placeholder="groups">
                                            <option class="form-control" value="" selected>Select A Group</option>
                                            @foreach ( $groups as $group)
                                            <option value="{{$group->id}}" {{ old('group_id') == $group->id ? 'selected' : '' }}>{{$group->title}}</option>
                                            @endforeach                                                     
                                          </select>

                                          <div class="small text-danger">
                                            @error('group_id')
                                                *{{$message}}
                                            @enderror
                                        </div>
                                     
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-4 mb-sm-1">
                                            <input type="file" name="image" value="{{old('image')}}"  class="form-control mb-2" id="img">   
                                    </div>

                                    <div class="col-lg-2">
                                        <img style="visibility:hidden"  class="img-fluid img-thumbnail" width=100% id="prview" src=""/>   
                                    </div>
                                    
                            
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>

                                <hr>
                              
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <img  class="img-fluid img-thumbnail" height="10px" id="prview" src=""/>   
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

    <script>             //JS for Image Preview
        img.onchange = evt => {
          const [file] = img.files
          if (file) {
            prview.style.visibility = 'visible';
        
            prview.src = URL.createObjectURL(file)
          }
        }
        </script>

</body>

</html>

