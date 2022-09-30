@extends('Layout.admin')

@section('main_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-gray-600">Sales Report</h3>


        <div class="row">

            <form class="form-inline" action="{{route('reports.sales')}}" method="get">

                <label for="inlineFormInputName2"> Start Date:  </label>
                <input type="date" name="start_date" value="" class="form-control m-1 mr-sm-2" id="inlineFormInputName2" placeholder="Start Date">

                <label for="inlineFormInputGroupUsername2"> End Date:  </label>
                <div class="input-group m-1 mr-sm-2">
                  <input type="date" name="end_date" value="" class="form-control" id="inlineFormInputGroupUsername2" placeholder="End Date">
                </div>

                <button type="submit" class="btn btn-primary btn-sm mr-3">Submit</button>
              </form>
        </div>

    </div>





    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales Report From- <b style="background-color: rgb(213, 216, 247) ">{{date('d-F-Y', strtotime( $start_date ))}}</b> To <b style="background-color: rgb(213, 216, 247)"> {{date('d-F-Y', strtotime( $end_date))}}</b></h6>
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



                        {{-- @foreach ($sales as $sale)
              
                        <tr>
                            @php
                                dd($sale->items[0]->price)
                            @endphp
                            @php
                            $totalQuantity += $sale->items[0]->quantity;
                            $grandTotal += $sale->items[0]->total;
                        @endphp
                            <td>{{ $loop->iteration }}</td>
                             <td>{{ $sale->items[0]->product->title}}</td> 
                            <td><img style="height: 60px; width: 80px;" src="{{ asset(Storage::url($sale->items[0]->product->image )) }}"> 
                        <td>{{ $sale->items[0]->quantity}}</td> 
                            <td>{{ $sale->items[0]->price}}</td>
                            <td>{{ $sale->items[0]->total}}</td>
                            <td>{{date('d-F-Y', strtotime( $sale->date))}}</td>
                        </tr>
                    @endforeach --}}



                     @foreach ($items as $item)

                     @php
                     $totalQuantity += $item->quantity;

                     $grandTotal += $item->total;
                         
                     @endphp

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title}}</td>
                        <td><img style="height: 60px; width: 80px;" src="{{ asset(Storage::url($item->image )) }}">
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->total }}</td> 
                         <td>{{date('d-M-Y', strtotime( $item->date))}}</td>
                    </tr>
                    @endforeach  


                    </tbody>


                    <tfoot class="thead-light">
                    
                        <tr>
               
   
        
                       
            
                       
                            <th colspan="3" class="text-right">Total Items = </th>
                            <th style="color: red;"> 
                                {{$totalQuantity}}
                            </th>
                            <th class="text-right">Grand Total = </th>
                            <th colspan="2" style="color: red;">{{$grandTotal}} Taka</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection