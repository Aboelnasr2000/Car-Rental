@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    $("#Pdate").datepicker({
        numberOfMonth: 2,
        dateFormat: 'yy-mm-dd',
        onSelect: function(selected) {
            $("#Rdate").datepicker("option", "minDate", selected);
        }
    });

    $("#Rdate").datepicker({
        numberOfMonth: 2,
        dateFormat: 'yy-mm-dd',
        onSelect: function(selected) {
            $("#Pdate").datepicker("option", "maxDate", selected);
        }
    });
});

</script>
<div class="row-cols-md-auto">
    <div class="container">
        <div class="center" style="padding-left: auto; padding-right:auto; text-align: center;">
            <form class="center" style="padding-left: auto; padding-right:auto; " action="{{ url('Cars') }}"
                enctype="multipart/form-data" method="GET">
                <br>
                <label for="">Pickup Date</label>
                <input class="p-3 pb-3 pb-md-4 mb-md-2" style="padding-left: auto; padding-right:auto; " type="text"
                    id="Pdate" class="form-control" name="PickupDate">
                <br>
                <label for="">Return Date</label>
                <input class="p-3 pb-3 pb-md-4 mb-md-2" type="text" id="Rdate" class="form-control" name="ReturnDate">
                <br>
                <div>
                    <label for="">Office</label>
                    <select class="form-control" name="City" required focus>
                        <option value="" disabled selected>Select Office</option>
                        @foreach($Offices as $Office)
                        <option value="{{$Office->City}}">{{$Office->City}} , {{$Office->Country}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mt-md-3 "
                    style="border-radius: 15px;font-size:1.4rem; box-sizing: 15px">
                    Pick
                </button>
            </form>
        </div>
    </div>
</div>

@endsection