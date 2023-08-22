<a class="text-decoration-none ml-1" href="#" data-toggle="modal" data-target="#edit-modal"><button class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button></a>
<a class="text-decoration-none mx-1"><button class="btn btn-danger btn-sm" title="Delete" id="submitBtn"><i class="fas fa-trash"></i></button></a>
<form id="myForm" action="{{ route('backoffice.transactions.expenses.destroy', $expense) }}" method="post">
    @csrf
    @method('delete')
</form>

<!-- Edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Expenses Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.transactions.expenses.update', $expense) }}" method="POST">
                @csrf
                @method('patch')
                <center class="my-3">
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Invoice No.:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="invoice" placeholder="Enter Invoice No." autocomplete="off" value="{{ $expense->invoice_no }}">
                    </div>
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Date:</div>
                        <input type="date" style="text-align: center;" class="form-control rounded-pill" name="date" placeholder="Enter Date" autocomplete="off" value="{{ $expense->date }}">
                    </div>
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Supplier:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="supplier" placeholder="Enter Supplier" autocomplete="off" value="{{ $expense->supplier }}">
                    </div>
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <textarea type="text" style="text-align: center;" class="form-control" placeholder="Enter Description" name="description" rows="3" cols="50" autocomplete="off">{!! $expense->description !!}</textarea>
                    </div>
                    <div class="form-group" style="width: 90%;">
                        <div class="d-flex justify-content-start">Amount:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="amount" placeholder="Enter Amount" autocomplete="off" value="{{ $expense->amount }}" step="any">
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

<script>
    $(document).ready(function() {
        $("#submitBtn").on("click", function() {
            $("#myForm").submit();
        });
    });
</script>