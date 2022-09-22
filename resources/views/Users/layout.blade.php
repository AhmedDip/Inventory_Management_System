@extends('Layout.admin')
@section('main_content')
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('users.index') }}" class="d-sm-inline-block btn btn-primary btn-sm"><i
                    class="fas fa-arrow-alt-circle-left"></i>
                Back </a>
            </div>
        
                <div class="col-md-8 mb-2 text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> New Sale </a>
        
                    <a href="{{ route('users.create') }}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> New
                        Purchase </a>
        
            

                                        
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#PaymentexampleModal"> <i class="fas fa-plus-circle"></i>
                        New
                        Payment
                    </button>
        
                    <a href="{{ route('users.create') }}" class="btn btn-dark btn-sm"><i class="fas fa-plus-circle"></i> New Receipt
                    </a>
               
        </div>


    </div>


    <div class="row">
        <div class="col-md-2">

            <div class="nav flex-column nav-pills">

                    <a class="nav-link @if($tab == 'show') active @endif "  href="{{ route('users.show', $users->id) }}" >User Details</a>

                    <a class="nav-link @if($tab == 'sales') active @endif"  href="{{route('user.sale',$users->id)}}" 
                        >Sales</a>

  
                    <a class="nav-link @if($tab == 'purchases') active @endif"  href="{{route('user.purchase',$users->id)}}" >Purchases</a>

                    
                    <a class="nav-link @if($tab == 'payments') active @endif"  href="{{route('user.payment',$users->id)}}"  >Payments</a>


                    <a class="nav-link @if($tab == 'receipts') active @endif"  href="{{route('user.receipt',$users->id)}}" >Receipts</a> 

            </div>
        </div>

        <div class="col-md-10">

            <div>
               @yield('user_content')
            </div>

        </div>
    </div>


@endsection
