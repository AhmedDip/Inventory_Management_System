@extends('Users.layout_customer')
@section('main_content')
  
<div class="d-sm-flex align-items-center justify-content-between mb-3">

    {{-- <h1 class="h3 mb-0 text-gray-800">Create New User</h1> --}}
</div>
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">View Profile - {{ $users->name }}</h4>
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
                                            class="font-weight-bold text-primary">Created At:
                                        </span> {{date('d-F-Y (h:i a)', strtotime($users->created_at))}}</li>
    
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
@endsection
