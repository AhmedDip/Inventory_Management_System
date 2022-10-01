@extends('Layout.admin')

@section('main_content')
<h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
    <div class="row">
        
        <div class="col-xl-3 col-md-4 mb-2">
            <div class="card border-info bg-gradient-info border-left-info shadow h-100">
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
            <div class="card border-info bg-gradient-info border-left-info shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">Total Stocks</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{$totalStocks}}
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
            <div class="card border-warning bg-gradient-warning border-left-warning shadow h-100">
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
                         <i class="fas fa-comments-dollar fa-3x text-gray-300"></i>
                     </div>     
         
                    
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-xl-3 col-md-4 mb-2"> 
            <div class="card border-success bg-gradient-success border-left-success shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Sales</div>
                                <div class="h5 mb-0 font-weight-bold text-white">
                                    <b style="font-size: 30px">৳ </b>{{$totalSales}}
                             </div>
                             
                        </div>
                        <div class="col-auto">
                         <i class="fas fa-hand-holding-usd fa-3x text-gray-300"></i>
                     </div>
           
                        
                                  
         
                    
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-xl-3 col-md-4 mb-2">
            <div class="card border-dark bg-gradient-dark border-left-dark shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Purchases</div>
                                <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 30px">৳ </b>{{$totalPurchases}} </div>
                        </div>
     
                        <div class="col-auto">
                         <i class="fas fa-file-invoice-dollar fa-3x text-gray-300"></i>
                     </div>
           
                      
             
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 mb-2">
            <div class="card border-dark bg-gradient-dark border-left-dark shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Receipts</div>
                                <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 30px">৳ </b>{{$totalReceipts}} </div>
                        </div>
     
                        <div class="col-auto">
                         <i class="fas fa-file-invoice-dollar fa-3x text-gray-300"></i>
                     </div>
           
                      
             
                    </div>
                </div>
            </div>
        </div> 
     
     
     
     
        <div class="col-xl-3 col-md-4 mb-2">
         <div class="card border-primary bg-gradient-primary border-left-primary shadow h-100">
             <div class="card-body">
     
     
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                           Total Payments</div>
                             <div class="h5 mb-0 font-weight-bold text-white">
                                <b style="font-size: 30px">৳ </b>{{$totalPayments}}
                               
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
        <div class="card border-dark bg-gradient-dark border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                         Cash In Hand</div>
                            <div class="h5 mb-0 font-weight-bold text-white"><b style="font-size: 30px">৳ </b>{{$totalReceipts - $totalPayments}} </div>
                    </div>
 
                    <div class="col-auto">
                     <i class="fas fa-file-invoice-dollar fa-3x text-gray-300"></i>
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
    


        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800">Charts</h1>
            <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
                The charts below have been customized - for further customization options, please visit the <a
                    target="_blank" href="https://www.chartjs.org/docs/latest/">official Chart.js
                    documentation</a>.</p>

            <!-- Content Row -->
            <div class="row">

                <div class="col-xl-8 col-lg-7">

                    <!-- Area Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                            <hr>
                            Styling for the area chart can be found in the
                            <code>/js/demo/chart-area-demo.js</code> file.
                        </div>
                    </div>

                    <!-- Bar Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="myBarChart"></canvas>
                            </div>
                            <hr>
                            Styling for the bar chart can be found in the
                            <code>/js/demo/chart-bar-demo.js</code> file.
                        </div>
                    </div>

                </div>

                <!-- Donut Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <hr>
                            Styling for the donut chart can be found in the
                            <code>/js/demo/chart-pie-demo.js</code> file.
                        </div>
                    </div>
                </div>

                
            </div>
               
    </div>

@endsection
