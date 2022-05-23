<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Modal -->
<div class="modal fade" id="makeAdminModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trainee Information</h5>
                <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            <div class="modal-body">

                <img src="{{ asset('uploads/users/'.$user->profile_image) }}" width="200px" height="200px" alt="Image"
                    class="img myimg">
                <p style="color: black;">{{$user->name}}</p>
                <p style="color: black;">Email: {{$user->email}}</p>
                <p style="color: red;">Are You Sure You Want To Make Admin ?</p>

            </div>
            <div class="modal-footer">
                <form action="/makeAdmin/{{$user->id}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

            </div>
        </div>
    </div>
</div>