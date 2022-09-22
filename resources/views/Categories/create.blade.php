@extends('Layout.admin')
@section('main_content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
</div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Create New Group</h4>
          </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('template/img/pencil.gif')}}" alt="" height="150px">
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('categories.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="usergroup" class="form-label">Category Title</label>
                                <input type="text" name="title" class="form-control" id="usergroup">
                                <div class="form-text">Title of the Category</div>
                              </div>
                                       
                            <button type="submit" class="btn btn-primary">Submit</button>
        
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