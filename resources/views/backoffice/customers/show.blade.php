@extends('layouts.app')

@section('title', 'Customers Record - '.$customer->name)

@section('content')

    <div class="container-fluid"><div class="d-flex justify-content-between">
        {{--<h6 class="mb-4"><a class="text-decoration-none" href="{{route("home")}}">Home</a> / Subscriptions / <a class="text-decoration-none" href="{{route("subscriptions.records")}}">Records</a> / Details</h6>
        <a href="actions/exportInvoice.php?id=1" class="text-decoration-none mx-2 font-weight-bold text-secondary" title="Export"><span><i class="fas fa-file-export"></i> .csv</span></a>--}}
    </div>

    <div class="row mx-0 mb-1">
        <div class="col-lg-6 col-md-12 p-0 border card my-1">
            <h4 class="card-header">Account Details&nbsp;&nbsp;<a class="text-primary" href="editRecord.php?id=1"><i class="text-info fa-sm fas fa-edit"></i></a></h4>
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <h6>Account:&nbsp;</h6>
                    <h4>{{ $customer->account_no }}</h4>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <table>
                            <tr>
                                <th style="width: 115px">Name</th>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $customer->address }}</td>
                            </tr>
                            <tr>
                                <th>Contact No.</th>
                                <td>{{ $customer->contact_no }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <td>{{ $customer->area }}</td>
                            </tr>
                            <tr>
                                <th>Subscription</th>
                                <td>{{ $subscription ? $subscription->product->name : '-' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <table>
                            <tr>
                                <th style="width: 135px">Birthday</th>
                                <td>{{ $customer->birth_date }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $customer->gender }}</td>
                            </tr>
                            <tr>
                                <th>Installation Date</th>
                                <td>{{ $installation ? \Carbon\Carbon::parse($installation->date)->format('M, d Y') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Remarks</th>
                                <td>{{ $installation ? $installation->remarks : '-' }}</td>
                            </tr>
                        </table>
                        <br>
                        <a class="text-decoration-none mr-1" href="billingView.php?id=1" @if (!$subscription) style="pointer-events: none" @endif>
                            <button class="btn btn-success btn-sm" title="Statement">
                                <i class="fas fa-print"></i>
                            </button>
                        </a>
                        <a class="text-decoration-none" href="#" data-toggle="modal" data-target="#transaction-modal">
                            <button class="btn btn-warning btn-sm" title="Transaction">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </a>
                        @include('backoffice.customers.modals._transaction')
                        <a class="text-decoration-none ml-1" href="#" data-toggle="modal" data-target="#removeModal">
                            <button class="btn btn-danger btn-sm" title="Archive">
                                <i class="fas fa-archive"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 p-0 border card my-1">
            <h4 class="card-header">Invoice Details</h4>
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <h6>Balance:&nbsp;</h6>
                    <div class="d-flex justify-content-start align-items-end">
                    <h4 class="">P{{ $customer->total_balance['total'] }}</h4>
                    <span class="text-success">
                        {{ $customer->total_balance['advance'] ? 'ADVANCE' : '' }}
                    </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6 col-md-6">
                        @php
                        if($billing) {
                            $due_date = \Carbon\Carbon::parse($billing->start_date)->addMonth();
                        }
                        @endphp
                        <h6>MRC: P{{ $subscription && $subscription->product->type == 'MRC' ? $subscription->product->price : '0.00' }}</h6>
                        <h6>Start Date: {{ $billing && $billing->status ? \Carbon\Carbon::parse($billing->start_date)->format('Y-M-d') : '-' }}</h6>
                        <h6>Due Date: {{ $billing && $billing->status ? $due_date->copy()->format('Y-M-d') : '-' }}</h6>
                        <h6>
                            Billing: {{ $billing && $billing->status ? 'Active' : 'Inactive' }}
                        </h6>
                        <h6>Bill Date: {{ $billing && $billing->status ? $due_date->copy()->subDays($billing->due_date)->format('Y-M-d') : '-' }}</h6>
                        <h6>Credit Limit: P{{ $subscription ? $subscription->credit_limit : '0.00' }}</h6>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h6>Service: {{ $subscription ? $subscription->service : '-' }}</h6>
                        <h6>
                            State: 
                            @if($subscription)
                                {{ $subscription->status ? 'Enable' : 'Disable' }}
                            @else
                                -
                            @endif
                        </h6>
                        <h6>Profile: {{ $subscription ? $subscription->profile : '-' }}</h6>
                        <h6>
                            Auth: 
                            @if($subscription)
                                {{ $subscription->username }} | {{ $subscription->password }}
                            @else
                                -
                            @endif
                        </h6>
                        <br>
                        <!-- Subscription | Service -->
                        <a class="text-decoration-none mr-1" href="#" data-toggle="modal" data-target="#add-subscription-modal">
                            <button class="btn btn-info btn-sm" title="Service">
                                <i class="fas fa-tools"></i>
                            </button>
                        </a>
                        @include('backoffice.customers.modals._service')

                        <!-- Billing Status -->
                        @if($billing)
                            @if($billing->status)
                                <a class="text-decoration-none mr-1" href="#" data-toggle="modal" data-target="#deactivate-billing-modal">
                                    <button class="btn btn-secondary btn-sm" title="Deactivate Billing">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </a>
                                @include('backoffice.customers.modals.deactivate')
                            @else
                                <a class="text-decoration-none mr-1" href="#" data-toggle="modal" data-target="#reactivate-billing-modal">
                                    <button class="btn btn-warning btn-sm" title="Reactivate Billing">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </a>
                                @include('backoffice.customers.modals.reactivate')
                            @endif
                        @else
                            <a class="text-decoration-none mr-1" href="#" data-toggle="modal" data-target="#activate-billing-modal" @if (!$subscription) style="pointer-events: none" @endif>
                                <button class="btn btn-success btn-sm" title="Activate Billing">
                                    <i class="fas fa-key"></i>
                                </button>
                            </a>
                            @include('backoffice.customers.modals.activate')
                        @endif

                        <!-- Account Status -->
                        <a class="text-decoration-none mr-1" href="#" data-toggle="modal" data-target="#enableModal" @if (!$subscription) style="pointer-events: none" @endif>
                            <button class="btn btn-success btn-sm" title="Status">
                                <i class="fas fa-power-off"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-0 mb-1">
        <div class="col-lg-6 col-md-12 p-0 border card my-1">

            <h6 class="card-header">PON Details</h6>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6">
                        <h6 style="font-size:0.8rem;">OLT Name: {{ $profile && $profile->olt_name ? $profile->olt_name : '-' }}</h6>
                        <h6 style="font-size:0.8rem;">PON port: {{ $profile && $profile->pon_port ? $profile->pon_port : '-' }}</h6>
                        <h6 style="font-size:0.8rem;">NAP Name: {{ $profile && $profile->nap_name ? $profile->nap_name : '-' }}</h6>
                        <h6 style="font-size:0.8rem;">NAP Port: {{ $profile && $profile->nap_port ? $profile->nap_port : '-' }}</h6>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h6 style="font-size:0.8rem;">ONU Name: {{ $profile && $profile->onu_name ? $profile->onu_name : '-'}}</h6>
                        <h6 style="font-size:0.8rem;">MAC Address: {{ $profile && $profile->mac_address ? $profile->mac_address : '-' }}</h6>
                        <h6 style="font-size:0.8rem;">Remarks 1: {{ $profile && $profile->remarks_1 ? $profile->remarks_1 : '-' }}</h6>
                        <h6 style="font-size:0.8rem;">Remarks 2: {{ $profile && $profile->remarks_2 ? $profile->remarks_2 : '-' }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 p-0 border card my-1">
            <h6 class="card-header d-flex justify-content-start">MikroTik Statistics <a href="" class="ml-2"><i class="fas fa-sync-alt text-success"></i></a></h6>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h6 style="font-size:0.8rem;">Address: <span class="text-primary">Inactive</span></h6>
                        <h6 style="font-size:0.8rem;">Uptime: <span class="text-primary">Inactive</span></h6>
                        <h6 style="font-size:0.8rem;">Caller-Id: <span class="text-primary">Inactive</span></h6>
                        <h6 style="font-size:0.8rem;">Last-Logged-Out: <span class="text-primary">None</span></h6>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h6 style="font-size:0.8rem;">Last-Disconnect-Reason: <span class="text-primary">
</span></h6>
                        <h6 style="font-size:0.8rem;">Local-Address: <span class="text-primary">
</span></h6>
                        <h6 style="font-size:0.8rem;">Remote-Address: <span class="text-primary">
</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-6">
            <iframe class="mx-0" style="width:100%" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB3UzIezjn2OlGjAoxaPTrblOmrZ6lintI&amp;q=M2VX+XQ+Quezon City,+Metro Manila" allowfullscreen="" width="400" height="250" loading="lazy"></iframe>
        </div>

        <div class="col-lg-4 col-md-6 mb-2">
            <img class="mx-0 py-4 border" style="width:100%;height:100%;" src="https://www.iseeyouonline.co.uk/wp-content/uploads/2015/07/street-view-copy.png">
        </div>
    </div>

    <div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Activate Billing Status?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Confirm" below if you want to activate billing for account selected.</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="displayLoader()" href="actions/billingToggle.php?id=1">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deactivate Billing Status?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Confirm" below if you want to deactivate billing for account selected.</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="displayLoader()" href="actions/billingToggle.php?id=1">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="enableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enable Account?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Confirm" below if you want to enable selected account.</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="displayLoader()" href="actions/stateToggle.php?id=1">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="disableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Disable Account?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Confirm" below if you want to disable selected account.</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="displayLoader()" href="actions/stateToggle.php?id=1">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('backoffice.subscriptions.customers.destroy', $customer) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Remove Account?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Confirm" below if you want to remove account selected.</div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="clearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clear Invoice Table?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Confirm" below if you want to clear Invoice Table.</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="displayLoader()" href="actions/clearInvoice.php?id=1">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-secondary">Invoice DataTable</h6>
            <a href="#" class="text-decoration-none mx-2 font-weight-bold text-danger" data-toggle="modal" data-target="#clearModal" title="Clear Table"><span><i class="fas fa-minus-circle"></i></span></a>
        </div>
        <div class="card-body">
            <div class="table-responsive table-sm" style="height:40vh;">
                <div class="modal fade" id="printModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Print Receipt</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form class="user" action="printReceiptRecords.php?id=1&amp;account=123" method="POST"></form>
                            <center class="my-3">
                                <div class="form-group" style="width: 70%;">
                                    <div class="d-flex justify-content-start">Paper Size:</div>
                                    <select class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="paper">
                                        <option value="thermal">Thermal Paper</option>
                                        <option value="a5">A5 Paper</option>
                                    </select>
                                </div>
                            </center>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" onclick="displayLoader()" class="btn btn-primary" name="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
                
                <table class="table table-bordered table-striped dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Account</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Reference</th>
                            <th>Amount</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customer->transactions as $transaction)
                            <tr>
                                <td style="font-size:0.8rem;">
                                    <a class="text-decoration-none" href="" title="SI">
                                        {{ $transaction->invoice }}<br>
                                        {{ $transaction->description }}</span>
                                    </a>
                                </td>
                                <td style="font-size:0.8rem;">{{ $transaction->customer->account_no }}<br>{{ $transaction->customer->name }}</td>
                                <td style="font-size:0.8rem;">
                                    @if($transaction->credit != 0.00)
                                        {{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-M-d') }}<br>
                                        {{ \Carbon\Carbon::parse($transaction->created_at)->toTimeString() }}
                                    @endif
                                </td>
                                <td style="font-size:0.8rem;">
                                    @if($transaction->debit != 0.00)
                                        {{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-M-d') }}<br>
                                        {{ \Carbon\Carbon::parse($transaction->created_at)->toTimeString() }}
                                    @endif
                                </td>
                                <td>{{ $transaction->reference_no }}</td>
                                <td style="font-size:0.8rem;">
                                    P{{ $transaction->credit != 0.00 ? $transaction->credit : $transaction->debit }}<br>
                                    {{ $transaction->created_by }}
                                </td>
                                <td>
                                    <div class="text-right">
                                        <a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#delete-modal-{{ $transaction->id }}"><button class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-archive"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                            @include('backoffice.customers.modals.delete_transaction')
                        @empty
                            <tr>
                                <td colspan="7"><em>No data.</em></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function getRandomSecret() {
            var random = Array.from(Array(8), () => Math.floor(Math.random() * 36).toString(36)).join('');
            document.getElementById("secret").value = random;
        }
    </script>
    <script>
        function getRandomSecretPass() {
            var random = Array.from(Array(8), () => Math.floor(Math.random() * 36).toString(36)).join('');
            document.getElementById("secretpass").value = random;
        }
    </script>
    <script>
        var mySelect = document.getElementById("mySelect");
        mySelect.addEventListener("change", function() {
            var selectedValue = this.options[this.selectedIndex].text;
            var selectedProduct = this.value;
            // Do something with the selected value
            document.getElementById("productAmount").value = selectedValue;
            if (selectedProduct == 'custom') {
                document.getElementById("cdescription").style.display = 'block';
            } else {
                document.getElementById("cdescription").style.display = 'none';
            }
        });
    </script>
</div>
@endsection
