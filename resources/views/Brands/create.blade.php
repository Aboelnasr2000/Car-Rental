@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Add Car
                        <a href="{{url('home') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('AddBrand')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Brand Name</label>
                            <input type="text" name="CarBrand">
                            <div class="form-group mb-3">
                                <label for="">Brand Logo</label>
                                <input type="file" name="BrandLogo" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-primary">Insert</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
@endsection