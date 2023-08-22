@if($customer->status)
    <a class="text-decoration-none ml-1" href="#"><button class="btn btn-primary btn-sm" title="Messaging"><i class="fas fa-envelope"></i></button></a>
    <a class="text-decoration-none ml-1" href="#"><button class="btn btn-info btn-sm" title="Ticketing"><i class="fas fa-question"></i></button></a>
    @if($customer->subscription != '')
        <a class="text-decoration-none ml-1" href="#" data-toggle="modal" data-target="#transaction-modal-{{$customer->id}}">
            <button class="btn btn-warning btn-sm" title="Transaction">
                <i class="fas fa-shopping-cart"></i>
            </button>
        </a>
        @if($customer->subscription->status)
            <a class="text-decoration-none ml-1" href="#" data-toggle="modal" data-target="#disable-modal-{{$customer->id}}">
                <button class="btn btn-secondary btn-sm" title="Status">
                    <i class="fas fa-power-off"></i>
                </button>
            </a>
        @else
            <a class="text-decoration-none ml-1" href="#" data-toggle="modal" data-target="#enable-modal-{{$customer->id}}">
                <button class="btn btn-success btn-sm" title="Status">
                    <i class="fas fa-power-off"></i>
                </button>
            </a>
        @endif
    @else
        <a class="text-decoration-none ml-1" href="#" data-toggle="modal" data-target="#payment-modal" style="pointer-events: none">
            <button class="btn btn-warning btn-sm" title="Transaction">
                <i class="fas fa-shopping-cart"></i>
            </button>
        </a>

        <a class="text-decoration-none ml-1" href="#" data-toggle="modal" data-target="#enable-modal" style="pointer-events: none">
            <button class="btn btn-success btn-sm" title="Status">
                <i class="fas fa-power-off"></i>
            </button>
        </a>
    @endif
@else
    <a class="text-decoration-none ml-1" href="#" data-toggle="modal" data-target="#force-delete-modal-{{$customer->id}}">
        <button class="btn btn-danger btn-sm" title="Trash">
            <i class="fas fa-archive"></i>
        </button>
    </a>
@endif

<!-- Enable Account Modal -->
<div class="modal fade" id="enable-modal-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enable Account?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to enable selected account.</div>
            <form action="#" method="post">
                @csrf
                @method('patch')

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Disable Account Modal -->
<div class="modal fade" id="disable-modal-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Disable Account?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to disable selected account.</div>
            <form action="#" method="post">
                @csrf
                @method('patch')

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Transaction -->
<div class="modal fade" id="transaction-modal-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- Delete Account -->
<div class="modal fade" id="force-delete-modal-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove Archived Permanently?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to remove permanently selected archived.</div>
            <form action="{{ route('backoffice.subscriptions.customers.remove-account', $customer) }}" method="post">
                @csrf
                @method('delete')

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

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