@extends('layouts.app')

@section('title', 'Support Tickets')

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
        $('#tickets-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": "{{ route('api.tickets.data') }}",
            "columns": [
                { "data": "account_no", "render": function(data, type, row) { return row.account_no; }},
                { "data": "account_name", "render": function(data, type, row) { return row.account_name; }},
                { "data": "col_subject", "render": function(data, type, row) { return row.col_subject; }},
                { "data": "status", "render": function(data, type, row) {
                    if(row.status) {
                        return '<span class="text-success">OPENED</span>';
                    } else {
                        return 'CLOSED';
                    }
                }},
                { "data": "updated_at", "render": function(data, type, row) { return '<em class="font-size-sm text-muted">'+moment(data).format('MMM DD, YYYY h:mm A')+'</em>'; }},
                { "data": "col_action", "render": function(data, type, row) { return row.col_action; }}
            ]
        });
    </script>
@endsection

@section('content')

<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-secondary">Support Tickets</h6>
            <div class="d-flex justify-content-between">
                <a href="#" data-toggle="modal" data-target="#add-modal" class="btn btn-outline-primary font-weight-bold">
                    <i class="fas fa-plus"></i>Add
                </a>
            </div>
        </div>
        @include('backoffice.tickets._modals')
        <div class="card-body">
            <div class="table-responsive table-sm">
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="tickets-table">
                    <thead>
                        <tr>
                            <th>Account</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Last Update</th>
                            <th>Action</th>
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