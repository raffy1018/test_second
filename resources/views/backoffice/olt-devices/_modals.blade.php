<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add OLT Device</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.olt-devices.store') }}" method="POST">
                @csrf
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">OLT Name:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="name" placeholder="Enter OLT Name" autocomplete="off">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="description" placeholder="Enter Description" autocomplete="off">
                        <div class="text-info" style="font-size:0.8rem;">Optional: Desciptive Information</div>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Standard:</div>
                        <select class="btn btn-white border form-control rounded-pill" style="text-align:center;width:100%;" name="standard">
                            <option value="" selected="" disabled>--Select one--</option>
                            @foreach(\App\Models\OltDevice::getStandardSelectOptions() as $standard)
                                <option value="{{ $standard['value'] }}">{{ $standard['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">PON Ports:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="pon_ports_no" placeholder="Enter PON Ports" autocomplete="off">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Remarks:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="remarks" placeholder="Enter Remarks" autocomplete="off">
                        <div class="text-info" style="font-size:0.8rem;">Optional: Remarks Addtional Information</div>
                    </div>
                </center>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>