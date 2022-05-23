@extends('layouts.app')


@section('content')

<div>
    {{-- @php($Mycars = session('MyCars')) --}}
    @if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <h1 class="container" style="color: black;">My Cars</h1>
    <h1 class="container myContainer p-4">
        @if($MyCars->count() != 0)
        @foreach($MyCars as $MyCar)
        <div class='col-md-12 p-2 d-flex'>
            <img src="{{ asset('uploads/Car/'.$MyCar->Image) }}" width="200px" height="200px " alt="Image"
                class="myimg2">
            <div style="font-size: 1.5rem; color: black; padding-top: 20px;">
                Model : {{$MyCar->Model}}
                <br>
                Transmisson : {{$MyCar->Trans}}
                <br>
                Information : {{$MyCar->Information}}
                <br>
                AC : {{$MyCar->AC}}
                <br>
                Price : {{$MyCar->Price}} EGP/Day
                <br>

            </div>
            @if ($MyCar->Status == "Available")

            <div style="text-align: left; align-self: end; padding-left: 400px;">
                <form action="/Disable/{{$MyCar->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-md-3  "
                        style="border-radius: 15px;font-size:1.4rem; box-sizing: 15px; text-align: left;">
                        Disable
                    </button>
                </form>
            </div>

            @else

            <div style="text-align: left; align-self: end; padding-left: 400px;">
                <form action="/Enable/{{$MyCar->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-md-3 "
                        style="border-radius: 15px;font-size:1.4rem; box-sizing: 15px">
                        Availble
                    </button>
                </form>
            </div>
            @endif
        </div>
        @endforeach
        @else
        <div style="color: black; text-align: center;">
            No Owned Cars
        </div>
        @endif
    </h1>
</div>
@endsection