@extends('layouts.app')

@section('title', 'OLT Device - '.$oltDevice->name)

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
        $('#pon-ports-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": "{{ route('api.olt-devices.ports') }}",
            "columns": [
                { "data": "port", "render": function(data, type, row) { return row.port; }},
                // { "data": "port", "render": function(data, type, row) { return '<a href="/backoffice/olt-devices/'+row.uid+'">'+data +'</a>'; }},
                { "data": "col_nap", "render": function(data, type, row) { return row.col_nap; }},
                { "data": "col_column", "render": function(data, type, row) { return row.col_column; }},
                { "data": "col_onu", "render": function(data, type, row) { return row.col_onu; }},
                { "data": "col_action", "render": function(data, type, row) { return row.col_action; }}
            ]
        });
    </script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="ml-1"><span style="font-size:0.8rem;">OLT Name:</span> <strong>{{ $oltDevice->name }}</strong></div>
    <div style="font-size:0.8rem;" class="ml-1">Description: {{ $oltDevice->description }}</div>
    <div style="font-size:0.8rem;" class="ml-1">Standard: {{ $oltDevice->standard }}</div>
    <div style="font-size:0.8rem;" class="ml-1">PON Ports: {{ $oltDevice->pon_ports_no }}</div>
    <div style="font-size:0.8rem;" class="mb-4 ml-1">Remarks: {{ $oltDevice->remarks }}</div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-secondary">PON Ports</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-sm">
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="pon-ports-table">
                    <thead>
                        <tr>
                            <th>PON</th>
                            <th>Total NAP</th>
                            <th>NAME | NAP | ONU | PORTS</th>
                            <th>Total ONU</th>
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