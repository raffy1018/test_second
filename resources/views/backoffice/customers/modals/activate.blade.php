<!-- Activate Billing -->
<div class="modal fade" id="activate-billing-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Activate Billing Status?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.subscriptions.billings.activate') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <center class="my-3">
                        <div class="form-group" style="width: 70%;">
                            <div class="d-flex justify-content-start">Service:</div>
                            <div class="d-flex justify-content-center">
                                <div class="form-check mx-3 mt-2">
                                    <input class="form-check-input" type="radio" name="type" value="POSTPAID" id="flexRadioDefault11" checked="">
                                    <label class="form-check-label" for="flexRadioDefault11">
                                        POSTPAID
                                    </label>
                                </div>
                                <div class="form-check mx-3 mt-2">
                                    <input class="form-check-input" type="radio" name="type" value="PREPAID" id="flexRadioDefault21">
                                    <label class="form-check-label" for="flexRadioDefault21">
                                        PREPAID
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="width: 70%;">
                            <div class="d-flex justify-content-start">Start Date:</div>
                            <input type="date" style="text-align:center;" class="form-control rounded-pill" name="start_date" placeholder="Enter Start Date">
                        </div>
                        <div class="form-group" style="width: 70%;">
                            <div class="d-flex justify-content-start">Bill Date:</div>
                            <input type="number" style="text-align: center;" class="form-control rounded-pill" name="bill_date" placeholder="Enter Number" value="0">
                            <div class="text-info" style="font-size:0.8rem;">Number in Days before Due Date</div>
                        </div>
                    </center>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>