@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>add doctor</span>
                    </div>
            </div>
        </div>
        <div class="col-lg-4">
         <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                 <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
         </div>
     </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
         <div class="alert alert-success">
             {{ Session::get('message')}}
         </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Add doctor</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('doctor.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Full name </label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="doctor">
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Email </label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email">
                                @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Password </label>
                            <input type="passwords" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="doctor password">
                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Gender </label>
                            <select class="form-control @error('gender') is-invalid @enderror"  name="gender">
                              <option value="">select</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                                @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Education </label>
                            <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="doctor highest degree">
                            @error('education')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror

                        </div>
                        <div class="col-lg-6">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address">
                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Specialist </label>
                            <input type="text" name="department" class="form-control @error('department') is-invalid @enderror">
                                @error('department')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Phone number</label>
                            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror">
                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                            <input type="file" name="img[]" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                                                        <span class="input-group-append">
                                                        </span>
                                                                @error('image')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Role</label>
                                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                        <option value="">Please select role</option>
                                        @foreach(App\Role::where('name','!=','patinet')->get() as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                     @enderror

                                </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">About</label>
                        <textarea  class="form-control @error('description') is-invalid @enderror" name="description" id="exampleTextarea1"  rows="4"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">
                        Submit
                    </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection