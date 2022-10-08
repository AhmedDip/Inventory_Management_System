<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ __('Hisab Kitab') }} </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>


    <div class="row m-3">
        <div class="text-center mb-3 pl-2">
            <img src="{{ public_path('template/img/main_logo.png') }}" alt="">
        </div>

        <div class="col-md-6 pb-4">
            <div><b>Supplier:</b> {{ $users->name }}</div>
            <div><b>Email:</b> {{ $users->email }}</div>
            <div><b>Phone:</b> {{ $users->phone }}</div>


        </div>


        <div class="col-md-6 text-right" style="float:right;margin-top:-110px;">
            <div><b>Date: </b>{{ date('d-F-y', strtotime($invoice->date)) }}</div>
            <div><b>Invoice Number: </b>{{ $invoice->invoice_no }}</div>
            <div><b>Address:</b> {{ $users->address }}</div>
            {{-- <div>
                    <img class="img-fluid img-thumbnail" height="100px" width="100px" id="prview"
                        src="{{ asset(Storage::url($invoice->items->products->image)) }}">
    
    
                </div> --}}

        </div>
    </div>







    <!-- Invoice area Starts -->
    <div class="invoice-area">
        <div class="invoice-wrapper">

            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody>


                        @php
                            $grandTotal = 0;
                        @endphp

                        @foreach ($invoice->items as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total }}</td>
                            </tr>
                        @endforeach


                    </tbody>

                    <tfoot>

                        <tr>
                            <th colspan="3"></th>
                            <th scope="col">Total =</th>
                            @php
                                 $total = $invoice->items()->sum('total')
                            @endphp
                            <th scope="col">
                                @if (!empty($item))
                                    {{ $total }} Taka
                                @elseif (empty($item))
                                    {{ 0 }} Taka
                                @endif

                            </th>
                        </tr>

                        <tr>
                            <th colspan="3"></th>
                            <th>Paid =</th>
                            <th scope="col">
                                @php
                                    $amount = $invoice->payments()->sum('amount');
                                    
                                @endphp

                                @if (!empty($amount))
                                    {{ $amount }} Taka
                                @elseif (empty($amount))
                                    {{ 0 }} Taka
                                @endif

                            </th>

                        </tr>





                        <tr>
                            <th colspan="3"></th>
                            <th scope="col">Due =</th>
                            <th scope="col">
                                @php
                                    $amount = $invoice->payments()->sum('amount');
                                    
                                @endphp

                                @if (!empty($amount))
                                    {{ $total - $amount }} Taka
                                @elseif (empty($amount))
                                    {{ 0 }} Taka
                                @endif

                            </th>

                        </tr>

                    </tfoot>
                </table>
            </div>




            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="font-size: 10px;">Copyright &copy; Ahmed Rasidun Bari Dip</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <!-- Invoice area end -->

</body>

</html>
