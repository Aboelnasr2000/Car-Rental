<div class="modal" id="SearchModal{{$PickupDate}}{{$ReturnDate}}{{$City}}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Search</h5>
                <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            <form action="/Search/{{$PickupDate}}/{{$ReturnDate}}/{{$City}}" enctype="multipart/form-data"
                method="POST">
                @csrf
                @php($Brands = \App\Models\CarBrand::get())
                <div class="modal-body">
                
                    <div>
                        <label for="">Brand</label>
                        <select class="form-control" name="Brand" required focus>
                            <option value="Any" selected>Any</option>
                            @foreach($Brands as $Brand)
                            <option value="{{$Brand->Brand}}">{{$Brand->Brand}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Model</label>
                        <input type="text" name="Model" class="form-control">
                    </div>

                    <div>
                        <label for=""> Air Conditioner </label>
                        <select class="form-control" name="AirConditioner">
                            <option value="Any" selected>Any</option>
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </div>
                    <div>
                        <label for=""> Transmisson </label>
                        <select class="form-control" name="Transmisson">
                            <option value="Any" selected>Any</option>
                            <option value="Manual"> Manual </option>
                            <option value="Automatic"> Automatic </option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Minumimum Price</label>
                        <input type="text" name="MinPrice" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Maxiumim Price</label>
                        <input type="text" name="MaxPrice" class="form-control">
                    </div>
                    <div>
                        <label for=""> Type </label>
                        <select class="form-control" name="Type">
                            <option value="Any" selected>Any</option>
                            <option value="Sports"> Sports </option>
                            <option value="SUV"> SUV </option>
                            <option value="Sedan"> Sedan </option>
                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="border-radius:15px;">Search</button>

                    </div>
            </form>
        </div>
    </div>
</div>