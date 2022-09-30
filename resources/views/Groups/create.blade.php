@extends('Layout.admin')
@section('main_content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <a href="{{ route('groups') }}" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i
            class="fas fa-arrow-alt-circle-left"></i>
        Back </a>
    {{-- <h1 class="h3 mb-0 text-gray-800">Create New User</h1> --}}
</div>


    <div class="card shadow mb-4 col-lg-6 col-md-12 col-sm-12">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Create New Group</h4>
          </div>
        <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6 ">
                        <img src="{{asset('template/img/pman.gif')}}" alt="" height="150px">
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('created.groups')}}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="usergroup" class="form-label">User Group Title</label>
                                <input type="text" name="title" class="form-control" id="usergroup">
                               
                              </div>
                                       
                            <button type="submit" class="btn btn-primary fa fa-paper-plane"> Submit</button>
        
                        </form>
                        
                    </div>

                    <div class="col-md-4 mt-4">
                        @error('title')
                        <div class="alert alert-danger" role="alert">
                            *{{$message}}
                        </div>                                
                        @enderror
                    </div>
                </div>               
        </div>
    </div>
@endsection