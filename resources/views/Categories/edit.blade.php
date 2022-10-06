@extends('Layout.admin')
@section('main_content')

    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i
            class="fas fa-arrow-alt-circle-left"></i>
        Go Back </a>
    </div>
    <div class="card shadow mb-4  col-lg-7 col-md-12 col-sm-12">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Category - {{$category->title}}</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('template/img/pencil.gif')}}" alt="" height="150px">
                    </div>
                    <div class="col-md-8">
                        <form action="/categories/{{$category->id}}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="mb-3">
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <label for="usergroup" class="form-label">Category Title</label>
                                <input type="text" name="title" value="{{$category->title}}" class="form-control" id="usergroup">
                                @error('title')
                                <div class="alert alert-danger" role="alert">
                                    *{{$message}}
                                </div>                                
                                @enderror
                              </div>
                                       
                            <button type="submit" class="btn btn-primary">Submit</button>
        
                        </form>
                        
                    </div>

                </div>       
                </div>               
        </div>
    </div>
@endsection
