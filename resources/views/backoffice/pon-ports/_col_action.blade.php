<a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#add-nap-modal-{{$pon->id}}">
    <button class="btn btn-primary btn-sm" title="Add">
        <i class="fas fa-plus"></i> NAP
    </button>
</a>

<div class="modal fade" id="add-nap-modal-{{$pon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add NAP Device</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.nap-devices.store') }}" method="POST">
                @csrf
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Name:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="name" placeholder="Enter NAP Name" autocomplete="off">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">NAP Number:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="nap_no" placeholder="Enter NAP Number" autocomplete="off">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Total Ports:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="nap_ports_no" placeholder="Enter Number of Ports" autocomplete="off">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Coordinates:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="coordinates" placeholder="Enter NAP Coordinates" autocomplete="off">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="description" placeholder="Enter NAP Description" autocomplete="off">
                    </div>
                </center>

                <input type="hidden" name="pon_port_id" value="{{ $pon->id }}">
                <input type="hidden" name="_redirect" value="{{ url()->previous() }}">
                
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>