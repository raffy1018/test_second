<!-- Transaction -->
<div class="modal fade" id="transaction-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transaction Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.subscriptions.transactions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Transaction:</div>
                        <select class="btn btn-white border form-control rounded-pill" style="text-align:center;width:100%;" name="type" id="myTransaction" onchange="changeTransaction()">
                            <option value="" selected="" disabled>--Select one--</option>
                            @foreach(\App\Models\Transaction::getTypeSelectOptions() as $type)
                                <option value="{{ $type['value'] }}">{{ $type['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Date:</div>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Amount:</div>
                        <input id="productAmount" type="number" style="text-align: center;" class="form-control rounded-pill" name="amount" placeholder="Enter Amount" autocomplete="off" step="any">
                        <div class="text-info" style="font-size:0.8rem;">Amount in PHP</div>
                    </div>
                    <div class="form-group" style="width: 70%;" id="reference">
                        <div class="d-flex justify-content-start">Reference No.:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="reference_no" placeholder="Enter Reference No." autocomplete="off">
                        <div class="text-info" style="font-size:0.8rem;">Optional: Tag an External Reference No.</div>
                    </div>
                    <div class="form-group" style="width: 70%;display: block;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <select id="mySelect" class="btn btn-white border form-control" style="text-align:left;width:100%;" name="description_type">
                            <option value="" selected="" disabled>--Select one--</option>
                            <option value="">No Description</option>
                            <option value="custom">Custom Description</option>
                            @foreach(\App\Models\Product::getSelectOptions() as $product)
                                <option value="{{ $product['value'] }}">{{ $product['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="transaction-description" class="form-group" style="width: 70%">
                        <input type="text" style="text-align: center;" class="form-control" name="description" placeholder="Enter Custom Description">
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

@push('scripts_after')
<script type="text/javascript">
    $(document).ready(function() {
        $("#reference").show();
        $("#transaction-description").hide();
        
        $('[name="type"]').on('change', function(event) {
            var type = $(this).val();
            if(type == 'Payment') {
                $("#reference").show();
            } else {
                $("#reference").hide();
            }
        });

        $('[name="description_type"]').on('change', function(event) {
            var type = $(this).val();
            if(type == 'custom') {
                $("#transaction-description").show();
                $('[name="description"]').val('');
                $('[name="amount"]').val('');
            } else {
                $("#transaction-description").hide();
                $('[name="amount"]').val('');
                if(type != '') {
                    $.ajax({
                        url: "{{ route('api.products.price') }}",
                        method: 'GET',
                        data: { product_id: type },
                        success: function(response) {
                            console.log(response);
                            $('[name="amount"]').val(response.price);
                            $('[name="description"]').val(response.description);
                        }
                    });
                }
            }
        });
    });
</script>
    <script>
        function changeTransaction() {
            var x = document.getElementById("myTransaction").value;
            if (x == 'Payment') {
                document.getElementById('reference').style.display = "block";
            } else {
                document.getElementById('reference').style.display = "none";
            }
        }
        function changeDescription() {
            var y = document.getElementById("myDescription").value;
            if (y == 'custom') {
                document.getElementById('transaction-description').style.display = "block";
            } else {
                document.getElementById('transaction-description').style.display = "none";
            }
        }
    </script>
@endpush