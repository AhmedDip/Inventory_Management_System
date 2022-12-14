@extends('Layout.admin')
@section('main_content')
    <div class="row">
        <div class="col-md-4">
            <a href="{{  route('users.show', $users->id) }}" class="d-sm-inline-block btn btn-primary btn-sm"><i
                    class="fas fa-arrow-alt-circle-left"></i>
                Back </a>
            </div>

    </div>


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
                                            <textarea name="note" required id="note" cols="25" rows="2" value="{{ old('note') }}">
                                   
                                            </textarea>

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
                                            <textarea name="note" required id="note" cols="25" rows="2" value="{{ old('note') }}">
                                   
                                            </textarea>

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





@endsection
