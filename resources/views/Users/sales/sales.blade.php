@extends('Users.layout')

@section('user_content')

    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Sales of - {{ $users->name }}</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                    
                            <th>SL No.</th>
                            <th>Invoice No.</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>                
                            <th>SL No.</th>
                            <th>Invoice No.</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($users->sales as $sale)

                        <tr>      
                            <td>{{$loop->iteration}}</td>              
                            <td>{{ $sale->invoice_no }}</td>
                            <td>{{ $users->name}}</td>
                            <td>{{$sale->date}}</td>

                        
                            <td>{{ $sale->items()->sum('total') }}</td>
                            <td>
                                <form method="POST" action=" {{ route('user.sales.destroy', ['id' => $users->id, 'invoice_id' => $sale->id ]) }} ">
                                    <a href="{{ route('user.sales.invoice_details', ['id' => $users->id,'invoice_id'=>$sale->id]) }}"
                                        class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i></a>

                                    <a href="{{ route('users.edit', ['user' => $users->id]) }}"
                                        class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>

                                    @csrf
                                    @method('DELETE')
                                    
                                    @if ($users->id!=1)

                                    <button onclick="return confirm('Are You Sure?')" type="submit"
                                    class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>

                                        
                                    @endif

                                 
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
