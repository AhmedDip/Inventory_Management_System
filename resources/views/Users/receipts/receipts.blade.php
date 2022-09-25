@extends('Users.layout')

@section('user_content')

    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Receipts of - {{ $users->name }}</h5>
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
                            <th colspan="3" class="text-right">Total =</th>
                            <th colspan="3">{{$users->receipts->sum('amount')}} Taka</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($users->receipts as $receipt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $users->name }}</td>
                        <td>{{date('d-M-Y', strtotime($receipt->date))}}</td>
                                <td>{{ $receipt->amount }}</td>
                                <td>{{ Str::substr($receipt->note , 0, 10) }}</td>
                                <td>
                                    <form action="/users/{{ $users->id }}/receipts/{{$receipt->id}}" method="post">

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
                                            <textarea name="note" required id="note" cols="25" rows="2" value="{{ old('note') }}"></textarea>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-4">
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
