@extends('Layout.admin')
@section('main_content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories Page</h1>
    <a href="{{route('categories.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Create New Categories</a>
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

                        @foreach ($category as $categories)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$categories->title}}</td>
                            <td>{{date('d F, Y', strtotime($categories->created_at))}}</td>
                            <td class="text-right">
                                <form action="/categories/{{$categories->id}}" method="post">
                                    <a href="{{ route('categories.edit', ['category' => $categories->id]) }}"
                                        class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    @if (1)
                                    <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    @endif

                         
                                
                                </form>
                            </td>
                            {{-- <td class="text-right"><a class="btn btn-danger"  href="">  <i class="fa fa-trash"></i> Delete</a> </td>                        --}}
                        </tr>
                        @endforeach
                
          
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection