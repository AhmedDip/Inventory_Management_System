@extends('Layout.admin')

@section('main_content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users Page</h1>
    <a href="{{route('users.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Create New User</a>
</div>

    <div class="card shadow mb-4">
     
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
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
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Group</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($users as $user )
                        <tr>
                          
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td><img style="height: 60px; width: 80px;" src="{{asset(Storage::url($user->image))}}"></td>
                           
                            <td>@if ($user->status==0)
                                Active 
                            @elseif ($user->status==1)
                            Suspend
                            @endif
                                
                            </td>            
                            <td>{{$user->group->title}}</td>
                            <td>
                                <form action="/users/{{$user->id}}" method="post">
                                    <a href="{{route('users.edit',['user'=> $user->id])}}" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')

                                <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                
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