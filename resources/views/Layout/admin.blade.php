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
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-animation.min.css">


</head>

<body id="page-top">
    @include('sweetalert::alert')
    @php
        header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
    @endphp


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
            @include('Layout.admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                 @include('Layout.admin.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    {{-- create message --}}
                    @if(Session::get('create'))
                        <div class="alert alert-success" role="alert">
                            <img src="{{asset('template/img/checkmark.gif')}}" alt="" height="40px">
                            {{Session::get('create')}}
                        </div>                 
                    @endif

                    @if(Session::get('delete'))
                    <div class="alert alert-danger" role="alert">
                        <img src="{{asset('template/img/cross.gif')}}" alt="" height="40px">
                        {{Session::get('delete')}}
                    </div>                 
                @endif

                   
                        @yield('user_card')
                   

                    @yield('main_content')

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

    <!-- Logout Modal-->
    @include('Layout.admin.logout')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>
    

      <!-- Page level plugins -->
      <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  
      <!-- Page level custom scripts -->
      <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>

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