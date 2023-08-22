<div class="modal fade" id="delete-modal-{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('backoffice.subscriptions.transactions.destroy', $transaction) }}" method="post" id="delete-form">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Invoice?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Confirm" below if you want to delete this Invoice {{ $transaction->sales_invoice_no }} from the Database.</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="submit-delete" class="btn btn-primary" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts_after')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#submit-delete').on('click', function() {
                $('#delete-form').submit();
            });
        });
    </script>
@endpush