@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h5>Brand</h5>
                        <span>Edit Brand</span>
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
                            <h3 style="color: black;">Add Brand</h3>
                        </div>
                        <div class="card-body">
                            <form class="forms-sample" action="/AdminAddBrand" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Brand Name</label>
                                            <input type="text" name="Brand"
                                                class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Brand Logo</label>
                                                <input type="file"
                                                    class="form-control file-upload-info @error('image') is-invalid @enderror"
                                                    placeholder="Upload Image" name="Logo">
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