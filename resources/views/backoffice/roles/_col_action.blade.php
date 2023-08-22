<a class="text-decoration-none mx-1 btn btn-warning btn-sm" href="{{ route('backoffice.roles.edit', $role) }}"><i class="fas fa-edit"></i> Edit</a>
<a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#delete-modal-{{ $role->id }}"><button class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i> Delete</button></a>

<!-- Delete -->
<div class="modal fade" id="delete-modal-{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Role?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to delete "{{ $role->name }}" role.</div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('backoffice.roles.destroy', $role) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>