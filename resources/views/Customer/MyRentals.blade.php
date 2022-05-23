@extends('layouts.app')

@section('content')
<div>
    <h1 class="container myContainer p-4">
        @foreach($MyRentals as $MyRental)
        <div class='col-md-12 p-2 d-flex'>
            <img src="{{ asset('uploads/Car/'.$MyRental->Image) }}" width="200px" height="200px " alt="Image"
                class="myimg2">
            <div style="font-size: 1.5rem; color: black; padding-top: 20px;">
                Start date : {{$MyRental->Start_date}}
                <br>
                End date : {{$MyRental->End_Date}}
                <br>
                City : {{$MyRental->City}}
                <br>
                Rental Id : {{$MyRental->rentalsid}}
                <br>
                {{$MyRental->Paid}}
            </div>
            @if($MyRental->Paid == "No")
            <div style="text-align: left; align-self: end; padding-left: 400px;">
                <form action="/Pay/{{$MyRental->rentalsid}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-md-3 "
                        style="border-radius: 15px;font-size:1.4rem; box-sizing: 15px">
                        Pay
                    </button>
                </form>
            </div>
            @endif
            <div style="text-align: left; align-self: end; padding-left: 30px;">
                <form action="/Cancel/{{$MyRental->rentalsid}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-md-3 "
                        style="border-radius: 15px;font-size:1.4rem; box-sizing: 15px">
                        Cancel Reservation
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </h1>
</div>
@endsection