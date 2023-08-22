<!-- EDIT NAP -->
<div class="modal fade" id="edit-nap-modal-{{ $napDevice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit NAP Device</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="{{ route('backoffice.nap-devices.update', $napDevice) }}" method="POST">
                @csrf
                @method('patch')
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Name:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="name" placeholder="Enter NAP Name" autocomplete="off" value="{{ $napDevice->name }}">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">NAP Number:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="nap_no" placeholder="Enter NAP Number" autocomplete="off" value="{{ $napDevice->nap_no }}">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Total Ports:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="nap_ports_no" placeholder="Enter Number of Ports" autocomplete="off" value="{{ $napDevice->nap_ports_no }}">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Coordinates:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="coordinates" placeholder="Enter NAP Coordinates" autocomplete="off" value="{{ $napDevice->coordinates }}">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="description" placeholder="Enter NAP Description" autocomplete="off" value="{{ $napDevice->description }}">
                    </div>
                </center>
                
                <input type="hidden" name="pon_port_id" value="{{ $napDevice->ponPort->id }}">
                <input type="hidden" name="_redirect" value="{{ url()->previous() }}">

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DELETE NAP -->
<div class="modal fade" id="delete-nap-modal-{{ $napDevice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete NAP Device??</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to delete this NAP Device from the Database.</div>
            <div class="modal-footer d-flex justify-content-center">
                <form action="{{ route('backoffice.nap-devices.destroy', $napDevice) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_redirect" value="{{ url()->previous() }}">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>