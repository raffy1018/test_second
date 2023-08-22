<a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#delete-modal-{{ $ticket->id }}">
    <button class="btn btn-danger btn-sm" title="Delete">
        <i class="fas fa-trash"></i>
    </button>
</a>

<!-- DELETE -->
<div class="modal fade" id="delete-modal-{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('backoffice.tickets.destroy', $ticket) }}" method="post">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this Ticket?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">Select "Confirm" below if you want to delete this Ticket from the Database.</div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>