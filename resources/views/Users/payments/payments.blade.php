@extends('Users.layout')

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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr style="background-color:rgb(226, 232, 235); color:rgb(52, 89, 253);">
                            <th colspan="3" class="text-right">Total = </th>
                            <th colspan="3">{{$users->payments->sum('amount')}} Taka</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($users->payments as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $users->name }}</td>
                        <td>{{date('d-M-Y', strtotime($payment->date))}}</td>
                                <td>{{ $payment->amount }}</td>
                                <td style="max-width: 80px;">{{$payment->note}}</td>
                                <td>
                                    <form action="/users/{{ $users->id }}/payments/{{$payment->id}}" method="post">

                                        @csrf
                                        @method('DELETE')

                                            <button onclick="return confirm('Are You Sure?')" type="submit"
                                                class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
