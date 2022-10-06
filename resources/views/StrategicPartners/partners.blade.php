@extends('Layout.admin')
@section('main_content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Strategic Partners</h1>
    <a href="{{route('partners.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create New Partners</a>
</div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($partner as $partners)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$partners->name}}</td>
                            <td><img style="height: 60px; width: 80px;" src="{{ asset(Storage::url($partners->image)) }}">
                            </td>
                            <td>{{date('d F, Y (h:i a)', strtotime($partners->created_at))}}</td>
                            <td>{{date('d F, Y (h:i a)', strtotime($partners->updated_at))}}</td>
                            <td class="text-right">
                                <form action="/partners/{{$partners->id}}" method="post">
                                    <a href="{{ route('partners.edit', ['partner' => $partners->id]) }}"
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