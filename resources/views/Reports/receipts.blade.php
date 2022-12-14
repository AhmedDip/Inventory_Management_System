@extends('Layout.admin')

@section('main_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-gray-600">Receipts Report</h3>

 
        <div class="row">

            <form class="form-inline" action="{{route('reports.receipts')}}" method="get">
    
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
            <h6 class="m-0 font-weight-bold text-primary">Receipts Report From- <b style="background-color: rgb(213, 216, 247) ">{{date('d-F-Y', strtotime( $start_date ))}}</b> To <b style="background-color: rgb(213, 216, 247)"> {{date('d-F-Y', strtotime( $end_date))}}</b></h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    @php
                        $total = 0;
                    @endphp
                    <tbody>


                        @foreach ($receipts as $receipt)
                        @php
                            $total += $receipt->amount;
                        @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{date('d-F-Y', strtotime( $receipt->date))}}</td>
                                <td>{{ optional($receipt->user)->name}}</td>
                                <td>{{ optional($receipt->user)->email}}</td>
                                <td><img style="height: 60px; width: 80px;" src="{{ asset(Storage::url(optional($receipt->user)->image )) }}">
                                <td>{{ $receipt->amount}}</td>

                            </tr>
                        @endforeach

                    </tbody>


                    <tfoot class="thead-light">
                        <tr>
                            <th colspan="5" class="text-right">Total Receipts = </th>
                            <th style="color: red;">{{$total}} Taka</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
