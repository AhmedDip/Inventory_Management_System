@extends('Users.layout_customer')

@section('user_content')

    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Payments of - {{ $users->name }}</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>SL No.</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr style="background-color:rgb(226, 232, 235); color:blue;">
                            <th colspan="3" class="text-right">Total =</th>
                            <th colspan="3">{{$users->receipts->sum('amount')}} Taka</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($users->receipts as $receipt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $users->name }}</td>
                        <td>{{date('d-F-Y', strtotime($receipt->date))}}</td>
                                <td>{{ $receipt->amount }}</td>
                                <td>{{ Str::substr($receipt->note , 0, 10) }}</td>
                          
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

 



@endsection
