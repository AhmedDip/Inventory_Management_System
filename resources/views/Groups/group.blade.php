@extends('Layout.admin')
@section('main_content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Groups Page</h1>
    <a href="{{route('create.groups')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Create New Group</a>
</div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($groups as $group )
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->title}}</td>
                            <td>{{$group->created_at}}</td>
                            <td class="text-right"><a class="btn btn-danger"  href="">  <i class="fa fa-trash"></i> Delete</a> </td>                       
                        </tr>
                        @endforeach
                
          
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection