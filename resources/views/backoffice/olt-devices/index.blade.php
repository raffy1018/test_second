@extends('layouts.app')

@section('title', 'PON Management')

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
        $('#pons-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": "{{ route('api.olt-devices.data') }}",
            "columns": [
                { "data": "name", "render": function(data, type, row) { return '<a href="/backoffice/olt-devices/'+row.uid+'">'+data +'</a>'; }},
                { "data": "col_nap", "render": function(data, type, row) { return row.col_nap; }},
                { "data": "col_onu", "render": function(data, type, row) { return row.col_onu; }},
                { "data": "description", "render": function(data, type, row) { return row.description; }},
                { "data": "standard", "render": function(data, type, row) { return row.standard; }},
                { "data": "pon_ports_no", "render": function(data, type, row) { return row.pon_ports_no; }},
                { "data": "remarks", "render": function(data, type, row) { return row.remarks; }},
                { "data": "col_action", "render": function(data, type, row) { return row.col_action; }}
            ]
        });
    </script>
@endsection

@section('content')

<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-secondary">PON Management</h6>
            <div class="d-flex justify-content-between">
                <a href="#" data-toggle="modal" data-target="#add-modal" class="btn btn-outline-primary font-weight-bold">
                    <i class="fas fa-plus"></i>Add
                </a>
            </div>
        </div>
        @include('backoffice.olt-devices._modals')
        <div class="card-body">
            <div class="table-responsive table-sm">
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="pons-table">
                    <thead>
                        <tr>
                            <th>OLT</th>
                            <th>Total NAP</th>
                            <th>Total ONU</th>
                            <th>Description</th>
                            <th>Standard</th>
                            <th>PON Ports</th>
                            <th>Remarks</th>
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