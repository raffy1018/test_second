<a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#edit-modal-{{ $permission->id }}"><button class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i> Edit</button></a>
<a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#delete-modal-{{ $permission->id }}"><button class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i> Delete</button></a>

<!-- Edit Modal -->
<div class="modal fade" id="edit-modal-{{ $permission->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Permission</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.permissions.update', $permission) }}" method="POST">
                @csrf
                @method('patch')
                <input type="hidden" name="router_id" value="{{ session('router_id') }}">
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Name:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="name" placeholder="Enter Permission Name" required="" value="{{ $permission->name }}">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="description" placeholder="Enter Permission Description" value="{{ $permission->description }}">
                        <div class="text-info" style="font-size:0.8rem;">Optional: Permission description</div>
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

<!-- Delete -->
<div class="modal fade" id="delete-modal-{{ $permission->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Permission?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to delete "{{ $permission->name }}" permission.</div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('backoffice.permissions.destroy', $permission) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>