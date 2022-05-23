@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                @foreach($Cars as $Car)
                <div class="container myContainer p-4">
                    <div class="row-md-4">
                        <div class="col-md-6">
                            <h3><img src="{{ asset('uploads/Car/'.$Car->Image) }}" width="100px" height="100px"
                                    alt="Image" class="img myimg">
                                {{ $Car->Model }} </h3>

                                <p>{{$Car->Information}}</p>
                                <p>Cost/Day: {{$Car->Price }} EGP </p>

                                <div class="col-md-12">
                                    <form action="/Rent/{{$Car->id}}" method="GET">
                                        @csrf
                                        <button class="btn btn-primary"
                                            style="border-radius: 20px;position: absolute;bottom: 0;right:0;font-size:1.5rem;">Rent
                                            Now</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection