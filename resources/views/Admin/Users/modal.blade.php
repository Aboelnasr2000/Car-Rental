<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Modal -->
<div class="modal fade" id="infoModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
            <div class="modal-body">
                <p>
                    <img src="{{ asset('uploads/users/'.$user->profile_image) }}" width="200px" height="200px"
                        alt="Image" class="img myimg"><br>
                <p class="badge badge-pill badge-primary"></p>
                <p style="color: black;">Name: {{$user->name}}</p>
                <p style="color: black;">Email: {{$user->email}}</p>
                <p style="color: black;">Phone Number: {{$user->phoneNumber}}</p>
                <p style="color: black;">Age: {{$user->age}}</p>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>