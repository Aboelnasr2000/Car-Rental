<div class="modal" id="SearchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Search</h5>
                <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            <form action="/AdminUserSearch" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="Model" class="form-control">
                    </div>

                    <div>
                        <label for=""> Phone Number </label>
                        <input type="text" name="PhoneNumber" class="form-control">
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Minumimum Age</label>
                        <input type="text" name="MinAge" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Maxiumim Age</label>
                        <input type="text" name="MaxAge" class="form-control">
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="border-radius:15px;">Search</button>

                    </div>
            </form>
        </div>
    </div>
</div>