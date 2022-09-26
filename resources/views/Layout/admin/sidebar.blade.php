 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div> --}}

        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hisab Kitab</div>
     
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Users Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if ($main_menu == 'user')
        active
    @endif" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse @if ($main_menu == 'user')
        show
    @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item @if ($main_menu == 'user')
                show
            @endif" href={{route('users.index')}}>Users</a>
                <a class="collapse-item" href={{url('groups')}}>Groups</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Products Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if ($main_menu == 'product')
        active
    @endif" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-shopping-bag"></i>
            <span>Products</span>
        </a>
        <div id="collapseOne" class="collapse @if ($main_menu == 'product')
        show
    @endif" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
           
                <a class="collapse-item @if ($sub_menu == 'product')
                active
            @endif" href={{url('products')}}>Products</a>
                <a class="collapse-item @if ($sub_menu == 'product_category')
                active
            @endif" href={{route('categories.index')}}>Categories</a>
            </div>
        </div>
    </li>


    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Stocks Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if ($main_menu == 'stock')
            active
        @endif" href="#" data-toggle="collapse" data-target="#collapsethree"
            aria-expanded="true" aria-controls="collapsethree">
            <i class="fas fa-cart-arrow-down"></i>
            <span>Stocks</span>
        </a>
        <div id="collapsethree" class="collapse @if ($main_menu == 'stock') show @endif" aria-labelledby="headingthree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item @if ($main_menu == 'stock') active @endif" href={{route('stocks')}}>Products Stock</a>
            </div>
        </div>
    </li>


    <hr class="sidebar-divider">


       <!-- Nav Item - Reports Pages Collapse Menu -->
       <li class="nav-item @if ( $main_menu == 'reports') 
          active
       @endif">
        <a class="nav-link"  href="#" data-toggle="collapse" data-target="#collapsefour"
            aria-expanded="true" aria-controls="collapsefour">
            <i class="fas fa-file-alt"></i>
            <span>Reports</span>
        </a>
        <div id="collapsefour" class="collapse @if ( $main_menu == 'reports') 
        show
     @endif"  aria-labelledby="headingthree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
              
                <a class="collapse-item @if($sub_menu == 'Sales') active @endif" href={{route('reports.sales')}}>Sales</a>
                <a class="collapse-item @if($sub_menu == 'Purchases') active @endif" href={{route('reports.purchases')}}>Purchases</a>
                <a class="collapse-item @if($sub_menu == 'Payments') active @endif" href={{route('reports.payments')}}>Payments</a>
                <a class="collapse-item @if($sub_menu == 'Receipts') active @endif" href={{route('reports.receipts')}}>Receipts</a>
            </div>
        </div>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->