@extends('Layout.admin')
@section('main_content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i
        class="fas fa-arrow-alt-circle-left"></i>
    Go Back </a>
</div>
    <div class="card shadow mb-4 col-lg-8 col-md-12 col-sm-12">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Create New Strategic Partners</h4>
          </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('template/img/Analytics.gif')}}" alt="" height="250px">
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('partners.store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="usergroup" class="form-label">Company Name</label>
                                <input type="text" name="name" class="form-control" id="usergroup">
                              </div>
                              <div>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    *{{$message}}
                                </div>                                
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Company's Logo</label>
        
                                <input type="file" name="image" id="image" class="form-control" required>
                              </div>
                              <div>
                                @error('image')
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