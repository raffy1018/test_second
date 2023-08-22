@extends('layouts.app')

@section('title', 'Vouchers')

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
        $('#vouchers-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": "{{ route('api.vouchers.data') }}",
            "columns": [
                { "data": "source", "render": function(data, type, row) { return row.source; }},
                { "data": "voucher", "render": function(data, type, row) { return row.voucher; }},
                { "data": "price", "render": function(data, type, row) { return row.price; }},
                { "data": "expired_at", "render": function(data, type, row) { return row.expired_at; }},
                { "data": "reference", "render": function(data, type, row) { return row.reference; }},
                { "data": "profile", "render": function(data, type, row) { return row.profile; }},
                { "data": "expired_at", "render": function(data, type, row) { return row.expired_at; }},
                { "data": "col_action", "render": function(data, type, row) { return row.col_action; }}
            ]
        });
    </script>
@endsection

@section('content')

<div class="container-fluid">
    {{--<div class="d-flex justify-content-between">
        <h6 class="mb-4"><a class="text-decoration-none" href="{{route('home')}}">Home</a> / Subscriptions / Products &amp; Services</h6>
        <a href="#" data-toggle="modal" data-target="#addModal" class="bg-succress text-decoration-none mx-1 font-weight-bold text-primary">
            <button type="button" class="btn btn-primary btn-sm" title="Add">
                <span>
                    <i class="fas fa-plus"></i>
                </span>
            </button>
        </a>
    </div>--}}

    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-secondary">Vouchers</h6>
            <div class="d-flex justify-content-between">
                <a href="{{ route('backoffice.hotspot-wifi.vouchers.create') }}" class="btn btn-outline-primary btn-sm font-weight-bold mr-2">
                    Add
                </a>
                <a href="{{ route('backoffice.hotspot-wifi.vouchers.create') }}" class="btn btn-primary btn-sm font-weight-bold">
                    Create Batch
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-sm">
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="vouchers-table">
                    <thead>
                        <tr>
                            <th>Source</th>
                            <th>Voucher</th>
                            <th>Amount</th>
                            <th>Uptime</th>
                            <th>Reference</th>
                            <th>Profile</th>
                            <th>Expiration</th>
                            <th>Purchased by</th>
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