@extends('layouts.app')

@section('title', 'Transactions History')

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
        $('#payments-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": "{{ route('api.transactions.payments') }}",
            "columns": [
                { "data": "id", "render": function(data, type, row) { return row.id; }},
                { "data": "date", "render": function(data, type, row) { return '<em class="font-size-sm text-muted">'+moment(data).format('MMM DD, YYYY')+'</em>'; }},
                { "data": "col_account", "render": function(data, type, row) { return row.col_account; }},
                { "data": "credit", "render": function(data, type, row) { return 'P'+row.credit; }},
                { "data": "type", "render": function(data, type, row) { return row.type; }},
                { "data": "reference_no", "render": function(data, type, row) { return row.reference_no; }},
                { "data": "created_at", "render": function(data, type, row) { return '<em class="font-size-sm text-muted">'+moment(data).format('MMM DD, YYYY h:mm A')+'</em>'; }}
            ]
        });
    </script>
@endsection

@section('content')

<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-secondary">Payments</h6>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('backoffice.transactions.payments.index') }}" class="text-decoration-none mx-1 text-secondary">PAYMENTS</a>
                     | 
                    <a href="{{ route('backoffice.transactions.charges.index') }}" class="text-decoration-none mx-1 text-success">CHARGES</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-sm">
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="payments-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Account</th>
                            <th>Amount</th>
                            <th>Transaction Type</th>
                            <th>Reference</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection