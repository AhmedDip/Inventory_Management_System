<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>Inventory Management System</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    @include('sweetalert::alert')
    @php
        header('Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
    @endphp


    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">
             

                    <div class="container">

                        <!-- Outer Row -->
                        <div class="row justify-content-center">
         
                            <div class="col-xl-10 col-lg-12 col-md-9">
  
                                <div class="card o-hidden border-0 shadow-lg my-5">
                                    <div class="card-body p-0">
                                        <!-- Nested Row within Card Body -->
                                        <div class="row">
                                            <div class="col-lg-6 d-none d-lg-block">
                                                <img src="{{ asset('template/img/login.gif') }}" alt="" height="550px">
                                              
                                            </div>
                                            <div class="col-lg-6">
            
                                                <div class="p-5">
                                                    <div class="text-center">
                                                        
                                                        <img src="{{asset('template/img/main_logo.png')}}" alt="" width="105%">
                                                    </div>
                                                    <form action="{{route('login.confirm')}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control form-control-user"
                                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                                placeholder="Enter Email Address">

                                                                <div>
                                                                    @error('email')
                                                                       <p class="text-danger">*{{$message}}</p> 
                                                                    @enderror
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" name="password"
                                                                class="form-control form-control-user"
                                                                id="exampleInputPassword" placeholder="Password">

                                                                <div>
                                                                    @error('password')
                                                                       <p class="text-danger">*{{$message}}</p> 
                                                                    @enderror
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox small">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck">
                                                                <label class="custom-control-label"
                                                                    for="customCheck">Remember
                                                                    Me</label>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>


                                                    </form>
                                                    <hr>
                                                    <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target=".bd-example-modal-sm">Admin's Login Information</button>

                                                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content p-3">
                                                           
                                                                <h3 class="btn btn-dark">Admin Login Info</h3>         
                                                                <p class="badge badge-primary">Email: admin@gmail.com</p>
                                                                <p class="badge badge-primary">Password: 123456</p>                     
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <a class="small" href="register.html">Create an Account for
                                                            Users!</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             <!-- Footer -->
             @include('Layout.admin.footer')
             <!-- End of Footer -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>


    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>




</body>

</html>
