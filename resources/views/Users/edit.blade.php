@extends('Layout.admin')
@section('main_content')
  
<div class="row">
    <div class="col-md-3 mb-2">
        <a href="{{ route('users.index') }}" class="d-sm-inline-block btn btn-primary btn-sm"><i
                class="fas fa-arrow-alt-circle-left"></i>
            Back </a>
    </div>

</div>
        
   
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit User - {{ $users->name }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="/users/{{ $users->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $users->id }}">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $users->name }}" class="form-control mb-2"
                                    id="name" placeholder="Enter the Name">

                            </div>

                    

                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" value="{{ $users->email }}" class="form-control mb-2"
                                    id="email" placeholder="Enter the email">
                            </div>

                            {{-- <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" name="password" value="{{ $users->password }}"
                                    class="form-control mb-2" id="password" placeholder="Enter the password">
                            </div> --}}

        

                            <label for="Phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" value="{{ $users->phone }}" class="form-control mb-2"
                                    id="Phone" placeholder="Enter the Phone Number">
                            </div>

                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" value="{{ $users->address }}" class="form-control mb-2"
                                    id="address" placeholder="Enter the Address">
                            </div>


                            
                            <label for="group" class="col-sm-3 col-form-label">Group</label>
                            <div class="col-sm-9">

                                <select class="form-control mb-2" name="group_id" id="group">
                                    <option class="form-control mb-2" value="" selected>Select An Option</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}"
                                            {{ $users->group_id == $group->id ? 'selected' : '' }}>{{ $group->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                         

                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control mb-2" name="status" id="status" >
                                    <option value="" selected>Select An Option</option>
                                    
                                    <option value=1 @if (($users->status) == 1) ? selected="selected" @endif > Active</option>
                                    <option value=0 @if (($users->status) == 0) ? selected="selected" @endif > Suspend</option>
                                    <option value=2 @if (($users->status) == 2) ? selected="selected" @endif > Pending</option>

                               
                                </select>
                            </div>
                                


              



                            <label for="img" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" value="{{ $users->image }}" class="form-control mb-2"
                                    id="img">
                            </div>
                        </div>

                        <div class=" text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>




                </div>
                </form>


                <div class="col-md-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <img class="img-fluid img-thumbnail" max-height="200px" id="prview"
                        src="{{ asset(Storage::url($users->image)) }}">
                    {{-- <img  style="visibility:hidden" class="img-fluid img-thumbnail" max-height="200px" id="prview" src=""/> --}}

                </div>

            </div>
        </div>
    </div>
@endsection
