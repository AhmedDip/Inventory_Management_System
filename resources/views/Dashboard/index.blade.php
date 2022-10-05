@extends('Layout.admin')

@section('main_content')
<h1 class="h3 mb-2 text-gray-800"><i class="fas fa-cube" style='font-size:24px'></i> Dashboard</h1>
    <div class="row">
        
        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #2d2f35, #4286f4);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{$totalUsers}}           
                            </div>
                        </div>
                     
                        <div class="col-auto">
                         <i class="fas fa-users fa-3x text-gray-300"></i>
                     </div>
           
                    </div>
                </div>
            </div>
        </div>

     


        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #18171a, #7336c2);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">Total Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{$totalAdmin}}           
                            </div>
                        </div>
                     
                        <div class="col-auto">
                         <i class="fas fa-chalkboard-teacher fa-3x text-gray-300"></i>
                     </div>
           
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #db7da1, #ad8327);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">Active Users</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{$ActiveUsers}}           
                            </div>
                        </div>
                     
                        <div class="col-auto">
                         <i class="fas fa-user-check fa-3x text-gray-300"></i>
                     </div>
           
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #44cbd4, #e22976);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">Pending Users</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{$PendingUsers}}           
                            </div>
                        </div>
                     
                        <div class="col-auto">
                         <i class="fas fa-user-clock fa-3x text-gray-300"></i>
                     </div>
           
                    </div>
                </div>
            </div>
        </div>

    


        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #36081a, #d1e293);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">Suspend Users</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{$SuspendUsers}}           
                            </div>
                        </div>
                     
                        <div class="col-auto">
                         <i class="fas fa-user-alt-slash fa-3x text-gray-300"></i>
                     </div>
           
                    </div>
                </div>
            </div>
        </div>
     
     
        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #2d2f35, #22c473);;"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Products</div>
                                <div class="h5 mb-0 font-weight-bold text-white">
                                    {{$totalProducts}}           
                                </div>      
                        </div>
     
                        
                             
                        <div class="col-auto">
                         <i class="fas fa-box fa-3x text-gray-300"></i>
                     </div>     
         
                    
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #2d2f35, #19aec2);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">Total Stocks</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{$totalStocks}}
                            </div>
     
                        </div>
     
                        <div class="col-auto">
                         <i class="fas fa-asterisk fa-spin fa-3x text-gray-300"></i>
                     </div>
           
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-xl-3 col-md-4 mb-2"> 
            <div style=" background: linear-gradient(to right, #2d2f35, #d319da);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Sales</div>
                                <div class="h5 mb-0 font-weight-bold text-white">
                                    ৳{{$totalSales}}
                             </div>
                             
                        </div>
                        <div class="col-auto">
                         <i class="fas fa-shopping-cart fa-3x text-gray-300"></i>
                     </div>
                   
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #2d2f35, #b60a43);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Purchases</div>
                                <div class="h5 mb-0 font-weight-bold text-white">৳{{$totalPurchases}} </div>
                        </div>
     
                        <div class="col-auto">
                         <i class="fas fa-shopping-bag fa-3x text-gray-300"></i>
                     </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #2d2f35, #eccf27);"class="card text-white shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Receipts</div>
                                <div class="h5 mb-0 font-weight-bold text-white">৳{{$totalReceipts}} </div>
                        </div>
     
                        <div class="col-auto">
                         <i class="fas fa-file-invoice-dollar fa-3x text-gray-300"></i>
                     </div>
           
                      
             
                    </div>
                </div>
            </div>
        </div> 
     
     
     
     
        <div class="col-xl-3 col-md-4 mb-2">
            <div style=" background: linear-gradient(to right, #2d2f35, #abafb1);"class="card text-white shadow">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                           Total Payments</div>
                             <div class="h5 mb-0 font-weight-bold text-white">
                                ৳{{$totalPayments}}
                               
                             </div>
                     </div>
     
                     <div class="col-auto">
                         <i class="fas fa-money-check-alt fa-3x text-gray-300"></i>
                     </div>
           
         
             
                 </div>
                     
             </div>
         </div>
     </div>

     <div class="col-xl-3 col-md-4 mb-2">
        <div style=" background: linear-gradient(to right, #2d2f35, #e66225);"class="card text-white shadow">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                         Cash In Hand</div>
                            <div class="h5 mb-0 font-weight-bold text-white">৳{{$totalReceipts - $totalPayments}} </div>
                    </div>
 
                    <div class="col-auto">
                     <i class="fas fa-hand-holding-usd fa-3x text-gray-300"></i>
                 </div>
       
                  
         
                </div>
            </div>
        </div>
    </div> 
 
        {{-- <div class="col-lg-3 mb-4">
            <div style=" background: linear-gradient(to right, #2d2f35, #4286f4);;"class="card text-white shadow">
                <div class="card-body">
                    Dark
                    <div class="text-white-50 small">#5a5c69</div>

                    <div class="col-auto m-3">
                        <i class="fas fa-donate fa-3x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div> --}}
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
