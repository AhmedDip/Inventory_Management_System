@extends('Layout.admin')

@section('main_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h3 class="h3 mb-0 text-gray-600">Stocks Of Product</h3>
    </div>

    <div class="card shadow mb-3">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>No. Of Purchases</th>
                            <th>No. Of Sales</th>
                            <th>In Stocks</th>  
         
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>No. Of Purchases</th>
                            <th>No. Of Sales</th>
                            <th>In Stocks</th>  
     
                        </tr>
                    </tfoot>
                    <tbody>

                   @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img style="height: 60px; width: 80px;" src="{{ asset(Storage::url($product->image)) }}">
                                </td>                        
                                <td>{{ $purchase = $product->purchases()->sum('quantity') }}</td>
                                <td>{{ $sale =  $product->sales()->sum('quantity') }}</td> 
                                <td>{{ $purchase - $sale }}</td>
                            </tr>
                        @endforeach 


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
