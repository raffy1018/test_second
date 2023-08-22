<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Expenses Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="{{ route('backoffice.transactions.expenses.store') }}" method="POST">
                @csrf
                <center class="my-3">
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Invoice No.:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="invoice_no" placeholder="Enter Invoice No." value="{{ \App\Models\Expense::getNextInvoiceNumber() }}" required="">
                    </div>
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Date:</div>
                        <input type="date" style="text-align: center;" class="form-control rounded-pill" name="date" placeholder="Enter Date" required="">
                    </div>
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Supplier:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="supplier" placeholder="Enter Supplier" required="">
                    </div>
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <textarea type="text" style="text-align: center;" class="form-control" placeholder="Enter Description" name="description" rows="3" cols="50" required=""></textarea>
                    </div>
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Amount:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="amount" placeholder="Enter Amount" required="" step="any">
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