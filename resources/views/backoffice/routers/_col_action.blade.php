<div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="dropdownMenuLink">
        <div class="dropdown-header">CONFIGURE</div>
        <div class="d-flex justify-content-center">
            <div class="d-flex justify-content-center mx-1">
                <a class=" text-primary" href="#" data-toggle="modal" data-target="#edit-modal-{{$router->id}}">
                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
            </div>
            <div class="d-flex justify-content-center mx-1">
                <a class="text-primary" href="#" data-toggle="modal" data-target="#delete-modal-{{$router->id}}">
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
            </div>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="edit-modal-{{$router->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Router Configuration</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.routers.update', $router) }}" method="POST" autocomplete="off">
                @csrf
                @method('patch')
                <center class="my-3 mx-5">

                    <div class="form-group">
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="domain" value="{{ $router->domain }}" placeholder="Enter Domain/IP Address">
                        <div class="text-info" style="font-size:0.8rem;">Router Domain/IP Address</div>
                    </div>

                    <div class="form-group">
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="port_no" value="{{ $router->port_no }}" placeholder="Enter Port Number">
                        <div class="text-info" style="font-size:0.8rem;">Router SSH Port Number</div>
                    </div>

                    <div class="form-group">
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="username" value="{{ $router->username }}" placeholder="Enter Username">
                        <div class="text-info" style="font-size:0.8rem;">Router SSH Login Username</div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-center">
                            <input type="password" style="text-align: center;" class="form-control rounded-pill" name="password" value="{{ $router->password }}" placeholder="Enter Password" id="show-password-{{ $router->id }}">
                            <i id="eyeStatus" class="fas fa-fw fa-eye" style="margin-left:-30px;margin-top:11px;z-index:2;" onclick="showAddPassword()"></i>
                        </div>
                        <div class="text-info" style="font-size:0.8rem;">Router SSH Login Password</div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </center>
            </form>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="delete-modal-{{$router->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Router Configuration</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to delete this Router Configuration from the
                Database.</div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('backoffice.routers.destroy', $router) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts_after')
    <script>
        function showAddPassword() {
            var x = document.getElementById("show-password-{{ $router->id }}");
            var y = document.getElementById("eyeStatus");
            if (x.type === "password") {
                x.type = "text";
                y.className = "fas fa-fw fa-eye-slash";
            } else {
                x.type = "password";
                y.className = "fas fa-fw fa-eye";
            }
        }
    </script>
@endpush