@extends('Layout.admin')
@section('main_content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
</div>
    <div class="card shadow mb-4 col-lg-7 col-md-12 col-sm-12">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Create New Category</h4>
          </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('template/img/Analytics.gif')}}" alt="" height="150px">
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('categories.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="usergroup" class="form-label">Category Title</label>
                                <input type="text" name="title" class="form-control" id="usergroup">
                              </div>
                              <div>
                                @error('title')
                                <div class="alert alert-danger" role="alert">
                                    *{{$message}}
                                </div>                                
                                @enderror
                            </div>
                                       
                            <button type="submit" class="btn btn-primary fa fa-paper-plane"> Submit</button>
        
                        </form>
                        
                    </div>
                   
                </div>               
        </div>
    </div>
@endsection