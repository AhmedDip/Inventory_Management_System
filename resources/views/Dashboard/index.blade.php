@extends('Layout.admin')

@section('main_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h3 class="h3 mb-0 text-gray-600"></h3>
    </div>

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
                                    {{$totalSales}}
                             </div>
                             
                        </div>
                        <div class="col-auto">
                         <i class="fas fa-hand-holding-usd fa-3x text-gray-300"></i>
                     </div>
           
                        
                                  
         
                    
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-xl-3 col-md-4 mb-3">
            <div class="card border-dark bg-gradient-dark border-left-dark shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Purchases</div>
                                <div class="h5 mb-0 font-weight-bold text-white">{{$totalPurchases}} </div>
                        </div>
     
                        <div class="col-auto">
                         <i class="fas fa-file-invoice-dollar fa-3x text-gray-300"></i>
                     </div>
           
                      
             
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 mb-3">
            <div class="card border-dark bg-gradient-dark border-left-dark shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                             Total Receipts</div>
                                <div class="h5 mb-0 font-weight-bold text-white">{{$totalReceipts}} </div>
                        </div>
     
                        <div class="col-auto">
                         <i class="fas fa-file-invoice-dollar fa-3x text-gray-300"></i>
                     </div>
           
                      
             
                    </div>
                </div>
            </div>
        </div> 
     
     
     
     
        <div class="col-xl-3 col-md-4 mb-3">
         <div class="card border-primary bg-gradient-primary border-left-primary shadow h-100">
             <div class="card-body">
     
     
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                           Total Payments</div>
                             <div class="h5 mb-0 font-weight-bold text-white">
                                {{$totalPayments}}
                               
                             </div>
                     </div>
     
                     <div class="col-auto">
                         <i class="fas fa-money-check-alt fa-3x text-gray-300"></i>
                     </div>
           
         
             
                 </div>
                     
             </div>
         </div>
     </div>

     <div class="col-xl-3 col-md-4 mb-3">
        <div class="card border-dark bg-gradient-dark border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                         Cash In Hand</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{$totalReceipts - $totalPayments}} </div>
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
    

    <div class="card shadow mb-3">
      
</div>

        <div class="card-body">
            <h4>This is Dashboard</h4>
                <!-- Color System -->
               
    </div>
@endsection
