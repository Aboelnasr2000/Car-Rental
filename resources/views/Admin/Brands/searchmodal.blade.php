<div class="modal" id="SearchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Search</h5>
                <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            <form action="/AdminBrandSearch" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="">Brand</label>
                        <input type="text" name="Model" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="border-radius:15px;">Search</button>
                    </div>
            </form>
        </div>
    </div>
</div>