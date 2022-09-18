@extends('Layout.admin')
@section('main_content')
    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i
                    class="fas fa-arrow-alt-circle-left"></i>
                Back </a>
        </div>


        <div class="col-md-8 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i> New Sale </a>

            <a href="{{ route('users.create') }}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> New
                Purchase </a>

            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> New
                Payment </a>

            <a href="{{ route('users.create') }}" class="btn btn-dark btn-sm"><i class="fas fa-plus-circle"></i> New Receipt
            </a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">

            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                    aria-controls="v-pills-home" aria-selected="true">users Details</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                    aria-controls="v-pills-profile" aria-selected="false">Sale</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                    aria-controls="v-pills-messages" aria-selected="false">Purchase</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                    aria-controls="v-pills-settings" aria-selected="false">Payment</a>
                    <a class="nav-link" id="v-pills->Receipt-tab" data-toggle="pill" href="#v-pills-Receipt" role="tab"
                    aria-controls="v-pills-Receipt" aria-selected="false">Receipt</a>
            </div>
        </div>

        <div class="col-md-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">User Details - {{ $users->name }}</h4>
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
                                                    <li class="list-group-item active"><b>Group:</b>
                                                        {{ $users->group->title }}</li>
                                                    <li class="list-group-item"><span
                                                            class="font-weight-bold text-primary">Name:</span>
                                                        {{ $users->name }}</li>
                                                    <li class="list-group-item"><span
                                                            class="font-weight-bold text-primary">Email:</span>
                                                        {{ $users->email }}</li>
                                                    <li class="list-group-item"> <span
                                                            class="font-weight-bold text-primary">Phone:</span>
                                                        {{ $users->phone }}</li>
                                                    <li class="list-group-item"> <span
                                                            class="font-weight-bold text-primary">Address:
                                                        </span> {{ $users->address }}</li>
                                                    <li class="list-group-item"> <span
                                                            class="font-weight-bold text-primary">Status:</span>
                                                        @if ($users->status == 0)
                                                            <p class="badge badge-success">Active</p>
                                                        @elseif ($users->status == 1)
                                                            <p class="badge badge-danger">Suspend</p>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- / project-info-box -->
                                        </div>
                                        <!-- / column -->

                                        <div class="col-md-4">
                                            <img class="img-fluid img-thumbnail" max-height="220px" id="prview"
                                                src="{{ asset(Storage::url($users->image)) }}">

                                               
                                        </div>
                                        <!-- / column -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Lorem
                    ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis magni vero impedit dicta cumque
                    ad asperiores quas, voluptatum sapiente nisi quidem dignissimos?
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas qui nihil itaque! Tenetur perspiciatis
                    itaque quam eaque pariatur placeat aspernatur excepturi aperiam eligendi dolores, cum suscipit quidem.
                    Magni, sed pariatur.
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis impedit esse natus quo facere eveniet,
                    provident officiis fugit nisi explicabo itaque, eum distinctio atque temporibus commodi, tempore illum.
                    Tempora, ab!
                </div>

                <div class="tab-pane fade" id="v-pills-Receipt" role="tabpanel" aria-labelledby="v-pills-Receipt-tab">
                   Dip Receipts
                </div>
            </div>

        </div>
    </div>
@endsection
