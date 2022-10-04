@extends('Layout.user')

@section('main_content')

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


   <h1 class="h3 mb-2 pt-4 text-gray-800">
    <i class='fas fa-chart-bar' style='font-size:24px'></i> Charts</h1>


<!-- Content Row -->
<div class="row">

    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-line"></i> Sale Invoices Overview</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
            </div>
        </div>



    </div>

    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-pie"></i> User Status Overview</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body mb-2">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                <div class="mt-4 text-center small">
                @foreach ($status as $stat )

             
                    <span class="mr-2">
                        @if($stat == 1)
                            <i class="fas fa-circle text-success"><span style="font-family:Verdana, Geneva, Tahoma, sans-serif"> Active</span></i>

                        @elseif ($stat == 2)
                        <i class="fas fa-circle text-warning"><span style="font-family:Verdana, Geneva, Tahoma, sans-serif"> Pending</span></i>
                      

                        @elseif ($stat == 0)
                        <i class="fas fa-circle text-danger"><span style="font-family:Verdana, Geneva, Tahoma, sans-serif"> Suspend</span></i>
                    
                        @endif
                    
                      
                    </span>
                    
                @endforeach
            
            </div>
        </div>
    </div>

    
</div>
   


@endsection