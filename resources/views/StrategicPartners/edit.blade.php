@extends('Layout.admin')
@section('main_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-primary btn-sm"><i
            class="fas fa-arrow-alt-circle-left"></i>
        Go Back </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 col-lg-12 col-md-12 col-sm-12">
            <h4 class="m-0 font-weight-bold text-primary">Edit Strategic Partner - {{ $partner->name }}</h4>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-4">
                        <img src="{{ asset('template/img/Analytics.gif') }}" alt="" style="height: 250px; width: 250px;">
                    </div>

                    <div class="col-lg-5">
                        <form action="/partners/{{ $partner->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <input type="hidden" name="id" value="{{ $partner->id }}">
                                <label for="usergroup" class="form-label">Company Name</label>
                                <input type="text" name="name" value="{{ $partner->name }}" class="form-control"
                                    id="usergroup">
                                <div>
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        *{{ $message }}
                                    </div>
                                @enderror

                                </div>

                                    
                            </div>

                            <div class="mb-3">
                                <label for="img" class="form-label">Company's Logo</label>

                                <input type="file" name="image" value="{{ $partner->image }}" class="form-control mb-2"
                                    id="img">
                                 

                           <div>
                            @error('image')
                                <div class="alert alert-danger" role="alert">
                                    *{{ $message }}
                                </div>
                            @enderror
                    </div>

                    


                     
                      
                </div>

                <button type="submit" class="btn btn-primary fa fa-paper-plane"> Submit</button>
            </div>

                    <div class="col-lg-3">
     
                        <img style="height: 250px; width: 250px;" class="img-fluid img-thumbnail"  id="prview"
                        src="{{ asset(Storage::url($partner->image)) }}">
                    </div>
                    
                    <div class="col-lg-4"></div>
                  
                   

                   
                        </form>

                      


                    </div>

                </div>
          
        </div>
   
    </div>
@endsection
