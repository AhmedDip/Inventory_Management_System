@extends('Layout.admin')

@section('main_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h3 class="h3 mb-0 text-gray-600">Pending Users</h3>

    </div>

    <div class="card shadow mb-3">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Group</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Group</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><img style="height: 60px; width: 80px;" src="{{ asset(Storage::url($user->image)) }}">
                                </td>

                                <td>
                                    @if ($user->status == 1)
                                        <p class="badge badge-success"> Active </p>
                                     
                                      
                                    @elseif ($user->status == 0)
                                        <p class="badge badge-danger">Suspend</p>
   
                                    @elseif ($user->status == 2)
                                    <p class="badge badge-warning">Pending</p>
                                @endif

                                </td>
                               
                                <td>{{ $user->group->title }}</td>
                                <td>

                            
                                           @if ($user->status == 2)
                                            <a href="{{ route('update.status', ['user_id' => $user->id,'status_code'=> 0]) }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-ban fa-spin"></i></a>
                                                <a href="{{ route('update.status', ['user_id' => $user->id,'status_code'=> 1 ]) }}"
                                                    class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                            @elseif($user->status == 1)
                                            <a href="{{ route('update.status', ['user_id' => $user->id,'status_code'=> 2 ]) }}"
                                                class="btn btn-warning btn-sm"><i class=" 	fa fa fa-hourglass-half fa-spin"></i></a>

                                                @elseif($user->status == 0)
                                                <a href="{{ route('update.status', ['user_id' => $user->id,'status_code'=> 1 ]) }}"
                                                    class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>

                                                    <a href="{{ route('update.status', ['user_id' => $user->id,'status_code'=> 2 ]) }}"
                                                        class="btn btn-warning btn-sm"><i class=" 	fa fa fa-hourglass-half fa-spin"></i></a>
                                         
                                                
                                            @endif 

                    
                                    
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
