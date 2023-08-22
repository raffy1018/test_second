@extends('layouts.app')

@section('title', 'NAP Ports')

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
        $('#nap-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": {
                "url": "{{ route('api.olt-devices.naps') }}",
                "data": {
                    "nap_device_id": "{{ $napDevice->id }}"
                }
            },
            "columns": [
                { "data": "pon_port_id", "render": function(data, type, row) { return row.pon_port_id; }},
                // { "data": "port", "render": function(data, type, row) { return '<a href="/backoffice/olt-devices/'+row.uid+'">'+data +'</a>'; }},
                { "data": "account_no", "render": function(data, type, row) { return row.account_no; }},
                { "data": "onu_name", "render": function(data, type, row) { return row.onu_name; }},
                { "data": "remarks_1", "render": function(data, type, row) { return row.remarks_1; }},
                { "data": "remarks_2", "render": function(data, type, row) { return row.remarks_2; }}
            ]
        });
    </script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="ml-1"><span style="font-size:0.8rem;">OLT Name:</span> <strong>{{ $oltDevice->name }}</strong></div>
            <div style="font-size:0.8rem;" class="ml-1">Description: {{ $oltDevice->description }}</div>
            <div style="font-size:0.8rem;" class="ml-1">Standard: {{ $oltDevice->standard }}</div>
            <div style="font-size:0.8rem;" class="ml-1">PON Ports: {{ $oltDevice->pon_ports_no }}</div>
            <div style="font-size:0.8rem;" class="mb-4 ml-1">Remarks: {{ $oltDevice->remarks }}</div>
        </div>
        <div class="col-md-4">
            <div class="ml-1"><span style="font-size:0.8rem;">NAP Name:</span> <strong>{{ $napDevice->name }}</strong></div>
            <div style="font-size:0.8rem;" class="ml-1">PON Port: {{ $napDevice->pon_port_id }}</div>
            <div style="font-size:0.8rem;" class="ml-1">NAP Number: {{ $napDevice->nap_no }}</div>
            <div style="font-size:0.8rem;" class="ml-1">Number of Ports: {{ $napDevice->nap_ports_no }}</div>
            <div style="font-size:0.8rem;" class="ml-1">Available Ports: {{ $napDevice->getAvailablePorts() }}</div>
        </div>
        <div class="col-md-4">
            <div style="font-size:0.8rem;" class="ml-1">Associated ONU: {{ $napDevice->getTotalOnu() }}</div>
            <div style="font-size:0.8rem;" class="ml-1">NAP Description: {{ $napDevice->description }}</div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-secondary">Associated ONU</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-sm">
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="nap-table">
                    <thead>
                        <tr>
                            <th>Port</th>
                            <th>Account</th>
                            <th>Name</th>
                            <th>Remarks 1</th>
                            <th>Remarks 2</th>
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
