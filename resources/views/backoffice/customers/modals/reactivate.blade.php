<!-- Reactivate Billing -->
<div class="modal fade" id="reactivate-billing-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reactivate Billing Status?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to reactivate billing for account selected.</div>
            <div class="modal-footer d-flex justify-content-center">
                <form action="{{ route('backoffice.subscriptions.billings.reactivate', $billing) }}" method="post">
                    @csrf
                    @method('patch')

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>