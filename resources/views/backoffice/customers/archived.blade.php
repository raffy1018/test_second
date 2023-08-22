@extends('layouts.app')

@section('title', 'Archived Record')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/plugins/moment/moment.min.js') }}"></script>

    <script type="text/javascript">
        $('#archived-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": "{{ route('api.customers.archived') }}",
            "columns": [
                { "data": "id", "render": function(data, type, row) { return '<a href="/backoffice/subscriptions/customers/'+row.uid+'">'+row.account_no +'</a>'; }},
                { "data": "col_date", "render": function(data, type, row) { return row.col_date; }},
                { "data": "col_details", "render": function(data, type, row) { return row.col_details; }},
                { "data": "col_product", "render": function(data, type, row) { return row.col_product; }},
                { "data": "col_service", "render": function(data, type, row) { return row.col_service; }},
                { "data": "col_status", "render": function(data, type, row) { return row.col_status; }},
                { "data": "col_balance", "render": function(data, type, row) { return row.col_balance; }},
                { "data": "col_action", "render": function(data, type, row) { return row.col_action }}
            ]
        });
    </script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <div></div>
        <div class="my-3">
            
        </div>
    </div>

    {{--<div class="d-flex justify-content-end">
        <form class="user" action="#" method="POST">
            <div class="d-flex justify-content-end mb-2">
                <div style="margin-top:8px; margin-right:5px;font-size:0.7rem;">Filter:</div>
                <select class="btn btn-white border form-control" style="text-align:left;width:110px;font-size:0.7rem;" name="filter" id="filter" onchange="this.form.submit()">
                    <option value="all" selected="">All</option>
                    <option value="withbalance">w/ Balance</option>
                    <option value="withoutbalance">w/o Balance
                    </option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="floating">Floating</option>
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                    <option value="profiled">Profiled</option>
                </select>
            </div>
        </form>
        <a class="text-decoration-none ml-1 text-secondary mt-1 mx-1" href="reportRecords.php?filter=all"><i class="fas fa-print"></i></a>
    </div>--}}

    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="my-auto">
                <h6 class="m-0 font-weight-bold text-secondary">Archived Record</h6>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{route('backoffice.subscriptions.customers.index')}}" class="text-decoration-none mx-1 text-success">CURRENT</a>
                     | 
                    <a href="{{route('backoffice.subscriptions.archived-test')}}" class="text-decoration-none mx-1 text-secondary">ARCHIVED</a>
                </div>
                {{--<a href="#" class="text-decoration-none mx-2 font-weight-bold text-danger" data-toggle="modal" data-target="#clearModal" title="Clear Table"><span><i class="fas fa-minus-circle"></i></span></a>--}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-sm">
                
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="archived-table">
                    <thead>
                        <tr>
                            <th>Account</th>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Subscription</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Balance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--<div class="modal fade" id="migrateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Migrate Subscribers?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" action="actions/migrate.php" method="POST">
                        <center>
                            <div class="form-group" style="width: 90%;">
                                <div class="form-group d-flex justify-content-center" style="width: 100%;">
                                    <div class="d-flex justify-content-center mx-3">
                                        <div>PPPOE:&nbsp;</div>
                                        <input type="checkbox" name="pppoeCheck" value="yes">
                                    </div>
                                    <div class="d-flex justify-content-center mx-3">
                                        <div>HOTSPOT:&nbsp;</div>
                                        <input type="checkbox" name="hotspotCheck" value="yes">
                                    </div>
                                </div>
                            </div>
                        </center>
                        Select a Service and click "Submit" below if you want to migrate existing subscribers from MikroTik.
                    </form></div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" onclick="displayLoader()" class="btn btn-primary" name="submit">Submit</button>
                </div>

            </div>
        </div>
    </div>--}}
</div>
@endsection