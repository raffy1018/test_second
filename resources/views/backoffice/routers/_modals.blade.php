<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Router Configuration</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.routers.store') }}" method="POST" autocomplete="off">
                @csrf
                <center class="my-3 mx-5">

                    <div class="form-group">
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="domain" placeholder="Enter Domain/IP Address">
                        <div class="text-info" style="font-size:0.8rem;">Router Domain/IP Address</div>
                    </div>

                    <div class="form-group">
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="port_no" placeholder="Enter Port Number">
                        <div class="text-info" style="font-size:0.8rem;">Router SSH Port Number</div>
                    </div>

                    <div class="form-group">
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="username" placeholder="Enter Username">
                        <div class="text-info" style="font-size:0.8rem;">Router SSH Login Username</div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-center">
                            <input type="password" style="text-align: center;" class="form-control rounded-pill" name="password" placeholder="Enter Password" id="myAddPassword">
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

@push('scripts_after')
    <script>
        function showAddPassword() {
            var x = document.getElementById("myAddPassword");
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