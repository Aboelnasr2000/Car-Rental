@extends('layouts.app')

@section('content')
<!-- Modal -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
    integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
    integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
</script>

<script>
$(document).ready(function() {
    $('.dropdown-toggle').dropdown();
});
</script>

<div class="container">
    <div>
        <h1 style="text-align:center;  color: black ;">Choose Car Brand</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="row">
                    @foreach($Brands as $ABrand)
                    <div class='col-md-1 p-2' style="text-align:center">
                        <a href="/Showcars/{{$ABrand->Brand}}/{{$PickupDate}}/{{$ReturnDate}}/{{$City}}">
                            <img src="{{ asset('uploads/Brands/'.$ABrand->BrandLogo) }}" width="100px" height="100px "
                                alt="Image" class="myimg2">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div style="text-align: center ;">
                    <a href="#" data-toggle="modal" data-target="#SearchModal{{$PickupDate}}{{$ReturnDate}}{{$City}}">
                        <img src="/uses/Search.png" alt="Rent A Car" width="50px" height="50px">
                        Advanced Search
                    </a>
                </div>
                @include('modals.modal')
            </div>
        </div>
    </div>
</div>

</div>
@if (session('Cars'))
<div>
    @php($Cars = session('Cars'))
    @php($no_cars = $Cars->count() )
    @if ($no_cars != 0)
    <h1 class="container myContainer p-4">
        @foreach($Cars as $Car)
        <div class='col-md-12 p-2 d-flex'>
            <img src="{{ asset('uploads/Car/'.$Car->Image) }}" width="200px" height="200px " alt="Image" class="myimg2">
            <div style="font-size: 1.5rem; color: black; padding-top: 20px;">
                Model : {{$Car->Model}}
                <br>
                Transmisson : {{$Car->Trans}}
                <br>
                Information : {{$Car->Information}}
                <br>
                AC : {{$Car->AC}}
                <br>
                Price : {{$Car->Price}} EGP/Day
                <br>

            </div>

            <div style="text-align: left; align-self: end; padding-left: 400px;">
                <form action="/rent/{{$Car->id}}/{{$PickupDate}}/{{$ReturnDate}}/{{$City}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-md-3 "
                        style="border-radius: 15px;font-size:1.4rem; box-sizing: 15px">
                        Pick
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </h1>
</div>
@else
<div>
    <h1 class="container myContainer p-4"  style="text-align: center; color: black;"   >
        No Available Cars
    </h1>
</div>
@endif
@endif
@endsection