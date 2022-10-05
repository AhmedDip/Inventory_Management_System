 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user.dashboard')}}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div> --}}

        <div class="sidebar-brand-icon">
            <img src="{{asset('template/img/main_logo_yl.png')}}"  style="width: 100%" alt="">
        </div>

     
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Products Pages Collapse Menu -->



    <li class="nav-item">
        <a class="nav-link" href="{{route('user.profile',Auth::user()->id)}}">
            <i class="fas fa-user-alt"></i>
            <span>My Profile</span></a>
    </li>



    <li class="nav-item">
        <a class="nav-link" href="{{route('profile.sales', Auth::user()->id)}}">
            <i class="fas fa-shopping-bag"></i>
            <span>Purchases</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('profile.purchases', Auth::user()->id)}}">
            <i class="fas fa-shopping-cart"></i>
            <span>Sales</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('profile.payments', Auth::user()->id)}}">
            <i class="fas fa-file-invoice-dollar"></i>
            <span>Receipts</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{route('profile.receipts', Auth::user()->id)}}">
            <i class="fas fa-money-check-alt"></i>
            <span>Payments</span></a>
    </li>

    <hr class="sidebar-divider">


    <li class="nav-item">
    <a class="nav-link" href="{{route('logout')}}">
        <i class="fas fa-sign-out-alt"></i>
       <span>Logout</span>
    </a>

</li>







    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->