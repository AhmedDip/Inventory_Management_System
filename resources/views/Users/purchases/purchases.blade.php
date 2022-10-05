@extends('Users.layout')

@section('user_content')

    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Purchases of - {{ $users->name }}</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                    
                            <th>SL No.</th>
                            <th>Invoice No.</th>
                            <th>User</th>
                            <th>Items</th>
                            <th>Date</th>                           
                            <th>Total</th>
                            <th>Action</th>
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
                            <td>{{ $users->name}}</td>
                            <td> 
                                @php
                                    $itemQty = $purchase->items()->sum('quantity');
                                    $totalItem += $itemQty;  
                                 @endphp
                                 {{ $itemQty}}
                            </td>
                            <td>{{date('d-M-Y', strtotime($purchase->date))}}</td>
                            <td>

                                @php

                                $total = $purchase->items()->sum('total');
                                $grandTotal += $total;       
                                @endphp
                               
                            {{$total}}


                            </td>
                            <td>

                         

                                <form method="POST" action=" {{ route('user.purchase.destroy', ['id' => $users->id, 'invoice_id' => $purchase->id ]) }} ">
                                    <a href="{{ route('user.purchase.invoice_details', ['id' => $users->id,'invoice_id'=>$purchase->id]) }}"
                                        class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i></a>

                                    @csrf
                                    @method('DELETE')
                                    

                                    @if ($purchase->items()->sum('total')==0 && $users->id!=1)

                                    <button onclick="return confirm('Are You Sure?')" type="submit"
                                    class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>

                                        
                                    @endif

                                 
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                
                    </tbody>

                    <tfoot class="thead-light" >
                        <tr>       
                            <th class="text-right" colspan="3">Total Items =</th>
                            <th colspan="1"> {{$totalItem}} </th>
                            <th class="text-right" style="color: blue;">Total = </th>         
                            <th colspan="2" style="color: blue;">{{$grandTotal}} Taka</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
