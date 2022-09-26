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
            <h4 class="m-0 font-weight-bold text-primary">Create New Product</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">

                                <select class="form-control mb-2" name="category_id" id="category">
                                    <option class="form-control mb-2" value="" selected>Select An Option</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control mb-2"
                                    id="title" placeholder="Enter The Brand Name">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                    <textarea type="text" name="description"
                                    class="form-control mb-2" id="description" placeholder="Enter The Description">{{old('description') }} </textarea>       
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="unit" class="col-sm-3 col-form-label">Unit</label>
                            <div class="col-sm-9">
                                <input type="text" name="unit" value="{{ old('unit') }}"
                                    class="form-control mb-2" id="unit" placeholder="Enter The Unit">

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cost_price" class="col-sm-3 col-form-label">Cost Price (৳)</label>
                            <div class="col-sm-9">
                                <input type="text" name="cost_price" value="{{ old('cost_price') }}"
                                    class="form-control mb-2" id="cost_price" placeholder="Enter The Cost Price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Sale price (৳)</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" value="{{ old('price') }}"
                                    class="form-control mb-2" id="price" placeholder="Enter The Sale Price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" value="{{ old('image') }}" class="form-control mb-2"
                                    id="img">
                            </div>
                        </div>


                        <div class=" text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                    <img style="visibility:hidden" class="img-fluid img-thumbnail" max-height="200px" id="prview"
                        src="" />



                </div>

            </div>
        </div>
    </div>
@endsection
