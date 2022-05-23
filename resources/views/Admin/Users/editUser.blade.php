@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>User</h5>
                        <span>Edit User</span>
                    </div>
                </div>
            </div>


            <div class="role justify-content-center">
                <div class="col-lg-10">
                    @if(Session::has('status'))
                    <div class="alert bg-success alert-success text-white" role="alert">
                        {{Session::get('status')}}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 style="color: black;">{{$user->name}}</h3>
                        </div>
                        <div class="card-body">
                            <form class="forms-sample" action="/EditUser/{{$user->id}}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="trainer name" value="{{$user->name}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="email" value="{{$user->email}}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="username" value="{{$user->username}}">
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phoneNumber"
                                                class="form-control @error('phoneNumber') is-invalid @enderror"
                                                placeholder="phoneNumber" value="{{$user->phoneNumber}}">
                                            @error('phoneNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Age</label>
                                            <input type="integer" name="age"
                                                class="form-control @error('age') is-invalid @enderror"
                                                placeholder="age" value="{{$user->age}}">
                                            @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file"
                                                class="form-control file-upload-info @error('image') is-invalid @enderror"
                                                placeholder="Upload Image" name="profile_image">
                                            <span class="input-group-append"></span>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <span class="input-group-append">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">
                                    Submit
                                </button>


                                <a href="{{url()->previous()}}" class="btn btn-light">Cancel</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @endsection