@extends('Layout.admin')
@section('main_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{ route('products.index') }}" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i
                    class="fas fa-arrow-alt-circle-left"></i>
                Back </a>
        </div>


        {{-- <div class="col-md-8 text-right">
            <a href="{{ route('products.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> New Sale
            </a>

            <a href="{{ route('products.create') }}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> New
                Purchase </a>

            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> New
                Payment </a>

            <a href="{{ route('products.create') }}" class="btn btn-dark btn-sm"><i class="fas fa-plus-circle"></i> New
                Receipt
            </a>
        </div> --}}
    </div> 


    <div class="row">

        <div class="col-md-12">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Products Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- / row list-project -->

                                    <div class="row list-project">
                                        <div class="col-md-8 tablet-top">

                                            <!-- / project-info-box -->

                                            <div class="mb-6">
                                                <ul class="list-group">
                                                    <li class="list-group-item list-group-item-dark"><b>Category:</b>
                                                        {{ $products->category->title }}</li>
                                                    <li class="list-group-item"><span
                                                            class="font-weight-bold text-primary">Brand:</span>
                                                        {{ $products->title }}</li>
                                                    <li class="list-group-item"><span
                                                            class="font-weight-bold text-primary">Description:</span>
                                                        {{ $products->description }}</li>
                                                    <li class="list-group-item"> <span
                                                            class="font-weight-bold text-primary">Cost Price:</span> 
                                                            ৳{{ $products->cost_price }}</li>
                                                    <li class="list-group-item"> <span
                                                            class="font-weight-bold text-primary">Sale Price:
                                                        </span> ৳{{ $products->price }}</li>

                                                  
                                                </ul>
                                            </div>
                                            <!-- / project-info-box -->
                                        </div>
                                        <!-- / column -->

                                        <div class="col-md-4">
                                            <img class="img-fluid img-thumbnail" max-height="220px" id="prview"
                                                src="{{ asset(Storage::url($products->image)) }}">


                                        </div>
                                        <!-- / column -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
