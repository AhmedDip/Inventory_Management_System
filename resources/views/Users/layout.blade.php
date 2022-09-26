@extends('Layout.admin')


@section('user_card')

    
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('users.index') }}" class="d-sm-inline-block btn btn-primary btn-sm"><i
                class="fas fa-arrow-alt-circle-left"></i>
            Back </a>
        </div>
    
            <div class="col-md-8 mb-2 text-right">

                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#SaleexampleModal"> <i class="fas fa-plus-circle"></i>
                    New
                    Sale
                </button>
    
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#PurchaseexampleModal"> <i class="fas fa-plus-circle"></i>
                    New
                    Purchase
                </button>
        

                                    
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#PaymentexampleModal"> <i class="fas fa-plus-circle"></i>
                    New
                    Payment
                </button>

                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#receiptexampleModal"> <i class="fas fa-plus-circle"></i>
                    New Receipt
                </button>

           
    </div>

</div>

<!-- Cards -->
<div class="row">

   <div class="col-xl-4 col-md-4 mb-4">
       <div class="card border-info border-left-info shadow h-100 py-2">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Sales</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800"><b style="font-size: 30px">৳</b>
                       
                           @php

                           $totalSales=0;

                           foreach ($users->sales as $sale)
                           $totalSales += $sale->items()->sum('total');
               
                          @endphp
                                           
                       {{ $totalSales }}
                       </div>

                   </div>

                   <div class="col-auto">
                    <i class="fas fa-comment-dollar fa-4x text-gray-300"></i>
                </div>
      
               </div>
           </div>
       </div>
   </div>

   <div class="col-xl-4 col-md-4 mb-4">
       <div class="card border-warning border-left-warning shadow h-100 py-2">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        Total Purchases</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800"><b style="font-size: 30px">৳</b>
                           
                           
                               @php

                               $totalPurchases=0;
   
                               foreach ($users->purchases as $purchase)
                               $totalPurchases += $purchase->items()->sum('total');
                   
                              @endphp
                                               
                           {{ $totalPurchases }}
                                            
                           </div>      
                   </div>

                   
                        
                   <div class="col-auto">
                    <i class="fas fa-comments-dollar fa-4x text-gray-300"></i>
                </div>     
    
               
               </div>
           </div>
       </div>
   </div>

   <div class="col-xl-4 col-md-4 mb-4"> 
       <div class="card border-success border-left-success shadow h-100 py-2">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        Total Payments</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800"><b style="font-size: 30px">৳ </b>{{ $totalPayments =  $users->payments()->sum('amount') }}
                        </div>
                        
                   </div>
                   <div class="col-auto">
                    <i class="fas fa-hand-holding-usd fa-4x text-gray-300"></i>
                </div>
      
                   
                             
    
               
               </div>
           </div>
       </div>
   </div>

   <div class="col-xl-4 col-md-4 mb-4">
       <div class="card border-dark border-left-dark shadow h-100 py-2">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        Total Receipts</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800"><b style="font-size: 30px">৳ </b>{{ $totalReceipts = $users->receipts()->sum('amount')}} </div>
                   </div>

                   <div class="col-auto">
                    <i class="fas fa-file-invoice-dollar fa-4x text-gray-300"></i>
                </div>
      
                 
        
               </div>
           </div>
       </div>
   </div>

   @php
   
            $totalBalance = ($totalPurchases + $totalReceipts) - ($totalSales + $totalPayments);

   @endphp
   


   <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-primary border-left-primary shadow h-100 py-2">
        <div class="card-body">


            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                      Total Balance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><b style="font-size: 30px">৳ </b>
                            @if ($totalBalance >= 0)
                            {{ $totalBalance }}
                        @else
                            0
                        @endif </div>
                </div>

                <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-4x text-gray-300"></i>
                </div>
      
    
        
            </div>
                
        </div>
    </div>
</div>

<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-danger border-left-danger shadow h-100 py-2">
        <div class="card-body">


            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                       Balance Due</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><b style="font-size: 30px">৳ </b>
                            @if ($totalBalance < 0)
                        {{ $totalBalance }}
                    @else
                        0
                    @endif </div>
                </div>

                <div class="col-auto">
                    <i class="fas fa-donate fa-4x text-gray-300"></i>
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

            <div class="nav flex-column nav-pills">

                    <a class="nav-link @if($tab == 'show') active @endif "  href="{{ route('users.show', $users->id) }}" >User Details</a>

                    <a class="nav-link @if($tab == 'sales') active @endif"  href="{{route('user.sales',$users->id)}}" 
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

     {{-- Modal For Adding New receipt --}}

    <!-- Modal -->
    <div class="modal fade" id="receiptexampleModal" tabindex="-1" role="dialog"
        aria-labelledby="receiptexampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="receiptexampleModalLabel">Add New receipt</h5>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('user.receipt.store', $users->id) }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" required name="date" value="{{ old('date') }}"
                                                class="form-control mb-2" id="date" placeholder="Enter the date">

                                        </div>

                                        <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" required name="amount" value="{{ old('amount') }}"
                                                class="form-control mb-2" id="amount" placeholder="Enter the amount">
                                        </div>


                                        <label for="note" class="col-sm-3 col-form-label">Note</label>
                                        <div class="col-sm-9">
                                            <textarea name="note" id="note" rows=2 cols=25 maxlength=250 value="" required="required"></textarea>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



     {{-- Modal For Adding New Payment --}}

    <!-- Modal -->
    <div class="modal fade" id="PaymentexampleModal" tabindex="-1" role="dialog"
        aria-labelledby="PaymentexampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PaymentexampleModalLabel">Add New Payment</h5>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('user.payment.store', $users->id) }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" required name="date" value="{{ old('date') }}"
                                                class="form-control mb-2" id="date" placeholder="Enter the date">

                                        </div>

                                        <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" required name="amount" value="{{ old('amount') }}"
                                                class="form-control mb-2" id="amount" placeholder="Enter the amount">
                                        </div>


                                        <label for="note" class="col-sm-3 col-form-label">Note</label>
                                        <div class="col-sm-9">
                                            <textarea name="note" required id="note" cols="25" rows="2" value="{{ old('note') }}"></textarea>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                    

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


       {{-- Modal For Adding New Sale --}}

    <!-- Modal -->
    <div class="modal fade" id="SaleexampleModal" tabindex="-1" role="dialog"
        aria-labelledby="SaleexampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SaleexampleModalLabel">Add New Sale</h5>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('user.sales.store', $users->id) }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" required name="date" value="{{ old('date') }}"
                                                class="form-control mb-2" id="date" placeholder="Enter the date">

                                        </div>

                                        <label for="invoice_no" class="col-sm-3 col-form-label">Invoice Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" required name="invoice_no" value="{{ old('invoice_no') }}"
                                                class="form-control mb-2" id="invoice_no" placeholder="Enter the Invoice Number">
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                               

                            </div>

                                

      




                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


      {{-- Modal For Adding New Purchase --}}

    <!-- Modal -->
    <div class="modal fade" id="PurchaseexampleModal" tabindex="-1" role="dialog"
        aria-labelledby="PurchaseexampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PurchaseexampleModalLabel">Add New Purchase</h5>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('user.purchase.store', $users->id) }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" required name="date" value="{{ old('date') }}"
                                                class="form-control mb-2" id="date" placeholder="Enter the date">

                                        </div>

                                        <label for="invoice_no" class="col-sm-3 col-form-label">Invoice Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" required name="invoice_no" value="{{ old('invoice_no') }}"
                                                class="form-control mb-2" id="invoice_no" placeholder="Enter the Invoice Number">
                                        </div>


                                        <label for="note" class="col-sm-3 col-form-label">Note</label>
                                        <div class="col-sm-9">
                                            <textarea name="note" required id="note" cols="25" rows="2" value="{{ old('note') }}"></textarea>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                    

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>






@endsection
