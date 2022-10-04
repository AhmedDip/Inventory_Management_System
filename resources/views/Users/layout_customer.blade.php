@extends('Layout.user')


@section('user_card')

    


<!-- Cards -->


<div class="row">

   <div class="col-xl-4 col-md-4 mb-2"  style="width: 18rem;">
       <div class="card border-info bg-gradient-info border-left-info shadow h-100">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-white text-uppercase mb-2">Total Sales</div>
                       <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 25px">৳</b>
                       
                           @php

                           $totalSales=0;

                           foreach ($users->sales as $sale)
                           $totalSales += $sale->items()->sum('total');
               
                          @endphp
                                           
                       {{ $totalSales }}
                       </div>

                   </div>

                   <div class="col-auto">
                    <i class="fas fa-comment-dollar fa-2x text-gray-300"></i>
                </div>
      
               </div>
           </div>
       </div>
   </div>


   <div class="col-xl-4 col-md-4 mb-2">
       <div class="card border-warning bg-gradient-warning border-left-warning shadow h-100">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                        Total Purchases</div>
                           <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 25px">৳</b>
                           
                           
                               @php

                               $totalPurchases=0;
   
                               foreach ($users->purchases as $purchase)
                               $totalPurchases += $purchase->items()->sum('total');
                   
                              @endphp
                                               
                           {{ $totalPurchases }}
                                            
                           </div>      
                   </div>

                   
                        
                   <div class="col-auto">
                    <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
                </div>     
    
               
               </div>
           </div>
       </div>
   </div>

   <div class="col-xl-4 col-md-4 mb-2"> 
       <div class="card border-success bg-gradient-success border-left-success shadow h-100">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                        Total Payments</div>
                           <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 25px">৳ </b>{{ $totalPayments =  $users->payments()->sum('amount') }}
                        </div>
                        
                   </div>
                   <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                </div>
      
                   
                             
    
               
               </div>
           </div>
       </div>
   </div>

   <div class="col-xl-4 col-md-4 mb-3">
       <div class="card border-dark bg-gradient-dark border-left-dark shadow h-100">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                        Total Receipts</div>
                           <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 25px">৳ </b>{{ $totalReceipts = $users->receipts()->sum('amount')}} </div>
                   </div>

                   <div class="col-auto">
                    <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                </div>
      
                 
        
               </div>
           </div>
       </div>
   </div>

   @php
   
            $totalBalance = ($totalPurchases + $totalReceipts) - ($totalSales + $totalPayments);

   @endphp
   


   <div class="col-xl-4 col-md-4 mb-3">
    <div class="card border-primary bg-gradient-primary border-left-primary shadow h-100">
        <div class="card-body">


            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                      Total Balance</div>
                        <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 25px">৳ </b>
                            @if ($totalBalance >= 0)
                            {{ $totalBalance }}
                        @else
                            0
                        @endif </div>
                </div>

                <div class="col-auto">
                    <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                </div>
      
    
        
            </div>
                
        </div>
    </div>
</div>

<div class="col-xl-4 col-md-4 mb-3">
    <div class="card border-danger bg-gradient-danger border-left-danger shadow h-100">
        <div class="card-body">


            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                       Balance Due</div>
                        <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 25px">৳ </b>
                            @if ($totalBalance < 0)
                        {{ $totalBalance }}
                    @else
                        0
                    @endif </div>
                </div>

                <div class="col-auto">
                    <i class="fas fa-donate fa-2x text-gray-300"></i>
                </div>
      
    
        
            </div>
                
        </div>
    </div>
</div>

  

  </div>
   
@endsection



@section('main_content')

    <div class="row">
        <div class="col-md-2">

            <div class="nav flex-column nav-pills bg-gradient-light">

                    {{-- <a class="nav-link @if($tab == 'show') active @endif "  href="{{ route('profile.show', $users->id) }}" >User Details</a> --}}

                    <a class="nav-link @if($tab == 'sales') active @endif"  href="{{route('profile.sales',$users->id)}}" 
                        >Sales</a>

  
                    <a class="nav-link @if($tab == 'purchases') active @endif"  href="{{route('profile.purchases',$users->id)}}" >Purchases</a>

                    
                    <a class="nav-link @if($tab == 'payments') active @endif"  href="{{route('profile.payments',$users->id)}}"  >Payments</a>


                    <a class="nav-link @if($tab == 'receipts') active @endif"  href="{{route('profile.receipts',$users->id)}}" >Receipts</a> 

            </div>
        </div>

        <div class="col-md-10">

            <div>
               @yield('user_content')
            </div>

        </div>
    </div>








@endsection
