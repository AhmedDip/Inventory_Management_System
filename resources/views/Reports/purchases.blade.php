@extends('Layout.admin')

@section('main_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-gray-600">Purchases Report</h3>

 
        <div class="row">

            <form class="form-inline" action="{{route('reports.purchases')}}" method="get">
    
                <label for="inlineFormInputName2"> Start Date:  </label>
                <input type="date" name="start_date" value="" class="form-control m-1 mr-sm-2" id="inlineFormInputName2" placeholder="Start Date">
              
                <label for="inlineFormInputGroupUsername2"> End Date:  </label>
                <div class="input-group m-1 mr-sm-2">
                  <input type="date" name="end_date" value="" class="form-control" id="inlineFormInputGroupUsername2" placeholder="End Date">
                </div>
              
                <button type="submit" class="btn btn-primary mb-1">Submit</button>
              </form>
        </div>
        
    </div>


 


    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchases Report From- <b style="background-color: rgb(213, 216, 247) ">{{date('d-F-Y', strtotime( $start_date ))}} </b> To <b style="background-color: rgb(213, 216, 247)"> {{date('d-F-Y', strtotime( $end_date))}}</b></h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                  
                    <tbody>

                        @php
                            $totalQuantity = 0;
                            $grandTotal = 0;
                        @endphp

       

                        @foreach ($purchases as $purchase)
                            <tr>
                                @php
                                $totalQuantity += $purchase->items[0]->quantity;
                                $grandTotal += $purchase->items[0]->total;
                            @endphp
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $purchase->items[0]->product->title  ?: '' }}</td>
                                <td><img style="height: 60px; width: 80px;" src="{{ asset(Storage::url($purchase->items[0]->product->image )) ?: ''  }}">
                                <td>{{ $purchase->items[0]->quantity ?: '' }}</td>
                                <td>{{ $purchase->items[0]->price ?: '' }}</td>
                                <td>{{ $purchase->items[0]->total ?: '' }}</td>
                                <td>{{date('d-F-Y', strtotime( $purchase->date)) ?: '' }}</td>
                        


        
                            </tr>
                        @endforeach

                    </tbody>


                    <tfoot class="thead-light">
                        <tr>
                            <th colspan="3" class="text-right">Total Items = </th>
                            <th>{{$totalQuantity}}</th>
                            <th class="text-right">Grand Total = </th>
                            <th  colspan="2" style="color: red;">{{$grandTotal}} Taka</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
