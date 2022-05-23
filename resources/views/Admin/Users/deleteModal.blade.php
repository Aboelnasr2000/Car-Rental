<div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">User Delete</h5>
                <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            <div class="modal-body">
                <h3 style="color: red;">Are you sure you want to delete ? <h3>
            </div>
            <div class="modal-footer">
            <a href="/AdminUserDelete/{{$user->id}}"><img src="/uses/TrashICON.png" alt="Rent A Car" width="25px" height="25px"></a>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>