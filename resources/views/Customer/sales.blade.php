@extends('Users.layout_customer')

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
                            <th>Name</th>
                            <th>Items</th>
                            <th>Date</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $totalItem = 0;
                            $grandTotal = 0;
                        @endphp

                        @foreach ($users->sales as $sale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sale->invoice_no }}</td>
                                <td>{{ $users->name }}</td>
                                <td>
                                    <?php
                                    $itemQty = $sale->items()->sum('quantity');
                                    $totalItem += $itemQty;
                                    ?>
                                    {{ $itemQty }}
                                </td>
                                <td>{{ date('d-M-Y', strtotime($sale->date)) }}</td>


                                <td>
                                    @php
                                        
                                        $total = $sale->items()->sum('total');
                                        $grandTotal += $total;
                                    @endphp

                                    {{ $total }}

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                    <tfoot class="thead-light">
                        <tr>
                            <th class="text-right" colspan="3" style="color:blue">Total Items =</th>
                            <th colspan="1" style="color:blue"> {{ $totalItem }} </th>
                            <th class="text-right" style="color:blue">Grand Total = </th>
                            <th colspan="2" style="color:blue">{{ $grandTotal }} Taka</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
