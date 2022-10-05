@extends('Users.layout_customer')

@section('user_content')

    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Sales of - {{ $users->name }}</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                    
                            <th>SL No.</th>
                            <th>Invoice No.</th>
                            <th>Items</th>
                            <th>Date</th>                           
                            <th>Total</th>
                        </tr>
                    </thead>
               
                    <tbody>
                        @php
                        $grandTotal = 0;
                        $totalItem = 0;
                    @endphp
                        @foreach ($users->purchases as $purchase)

                        <tr>      
                            <td>{{$loop->iteration}}</td>              
                            <td>{{ $purchase->invoice_no }}</td>
                            <td> 
                                @php
                                    $itemQty = $purchase->items()->sum('quantity');
                                    $totalItem += $itemQty;  
                                 @endphp
                                 {{ $itemQty}}
                            </td>
                            <td>{{date('d-F-Y', strtotime($purchase->date))}}</td>
                            <td>

                                @php

                                $total = $purchase->items()->sum('total');
                                $grandTotal += $total;       
                                @endphp
                               
                            {{$total}}


                            </td>
                    
                        </tr>
                            
                        @endforeach
                
                    </tbody>

                    <tfoot class="thead-light" >
                        <tr>       
                            <th class="text-right" colspan="2" style="color:blue">Total Items =</th>
                            <th colspan="1" style="color:blue"> {{$totalItem}} </th>
                            <th class="text-right" style="color:blue">Grand Total = </th>         
                            <th colspan="2" style="color:blue">{{$grandTotal}} Taka</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
