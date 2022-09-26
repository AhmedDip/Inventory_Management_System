@extends('Layout.admin')
@section('main_content')

    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <a href="{{ route('products.index') }}" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i
                class="fas fa-arrow-alt-circle-left"></i>
            Back </a>
        {{-- <h1 class="h3 mb-0 text-gray-800">Create New User</h1> --}}
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Product Details</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="/products/{{ $products->id }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">

                                <select class="form-control mb-2" name="category_id" id="category">
                                    <option class="form-control mb-2" value="" selected>Select An Option</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $products->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" value="{{ $category->title }}" class="form-control mb-2" 
                                    id="title" placeholder="Enter The Brand Name">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                    <textarea type="text" name="description" 
                                    class="form-control mb-2" id="description" placeholder="Enter The Description">{{$products->description}} </textarea>       
                            </div>
                        </div>

                    

                        <div class="form-group row">
                            <label for="unit" class="col-sm-3 col-form-label">Unit Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="unit" value="{{ $products->unit }}"
                                    class="form-control mb-2" id="unit" placeholder="Enter The Unit">

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cost_price" class="col-sm-3 col-form-label">Cost Price (৳)</label>
                            <div class="col-sm-9">
                                <input type="text" name="cost_price" value="{{ $products->cost_price }}"
                                    class="form-control mb-2" id="cost_price" placeholder="Enter The Cost Price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Sale price (৳)</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" value="{{ $products->price }}"
                                    class="form-control mb-2" id="price" placeholder="Enter the Sale Price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" value="{{ 4 }}" class="form-control mb-2"
                                    id="img">
                            </div>
                        </div>


                        <div class=" text-right">
                            <button type="submit" class="btn btn-primary">Edit Product</button>
                        </div>

                </div>
                </form>


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
                    <img class="img-fluid img-thumbnail" max-height="200px" id="prview"
                    src="{{ asset(Storage::url($products->image)) }}">




                </div>

            </div>
        </div>
    </div>
@endsection
