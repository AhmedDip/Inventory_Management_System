@extends('Layout.admin')

@section('main_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h3 class="h3 mb-0 text-gray-600">Products Page</h3>
        <a href="{{ route('products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create New product</a>
    </div>

    <div class="card shadow mb-3">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Cost Price (৳)</th>
                            <th>Sale Price (৳)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Cost Price</th>
                            <th>Sale Price</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->title }}</td>
                                <td><img style="height: 60px; width: 80px;" src="{{ asset(Storage::url($product->image)) }}">
                                </td>
                                <td>{{ $product->cost_price }}</td>
                                <td>{{ $product->price }}</td>

                              <td>
                                    <form action="/products/{{ $product->id }}" method="post">
                                        <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                            class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i></a>

                                        <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a> 

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
