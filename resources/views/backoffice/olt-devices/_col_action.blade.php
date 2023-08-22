<a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#edit-modal-{{ $olt->id }}"><button class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button></a>
<a class="text-decoration-none mx-1"><button class="btn btn-danger btn-sm" title="Delete" id="submitBtn"><i class="fas fa-trash"></i></button></a>
<form id="myForm" action="{{ route('backoffice.olt-devices.destroy', $olt) }}" method="post">
    @csrf
    @method('delete')
</form>

<div class="modal fade" id="edit-modal-{{ $olt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit OLT Device</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.olt-devices.update', $olt) }}" method="POST">
                @csrf
                @method('patch')
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">OLT Name:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" value="{{ $olt->name }}" placeholder="Enter OLT Name" autocomplete="off" name="name">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" value="{{ $olt->description }}" placeholder="Enter Description" autocomplete="off" name="description">
                        <div class="text-info" style="font-size:0.8rem;">Optional: Desciptive Information</div>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Standard:</div>
                        <select class="btn btn-white border form-control rounded-pill" style="text-align:center;width:100%;pointer-events: none;" name="standard" readonly="">
                            <option value="" selected="" disabled>--Select one--</option>
                            @foreach(\App\Models\OltDevice::getStandardSelectOptions() as $standard)
                                @if($standard['value'] == $olt->standard)
                                    <option value="{{ $standard['value'] }}" selected="">{{ $standard['label'] }}</option>
                                @else
                                    <option value="{{ $standard['value'] }}">{{ $standard['label'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">PON Ports:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" value="{{ $olt->pon_ports_no }}" placeholder="Enter PON Ports" autocomplete="off" name="pon_ports_no" readonly="">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Remarks:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" value="{{ $olt->remarks }}" placeholder="Enter Remarks" autocomplete="off" name="remarks">
                        <div class="text-info" style="font-size:0.8rem;">Optional: Remarks Addtional Information</div>
                    </div>
                </center>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#submitBtn").on("click", function() {
            $("#myForm").submit();
        });
    });
</script>