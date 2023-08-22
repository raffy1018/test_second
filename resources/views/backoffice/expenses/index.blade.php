@extends('layouts.app')

@section('title', 'Expenses')

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
        $('#expenses-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": "{{ route('api.expenses.data') }}",
            "columns": [
                { "data": "id", "render": function(data, type, row) { return row.id; }},
                { "data": "invoice_no", "render": function(data, type, row) { return row.invoice_no; }},
                { "data": "date", "render": function(data, type, row) { return row.date; }},
                { "data": "supplier", "render": function(data, type, row) { return row.supplier; }},
                { "data": "description", "render": function(data, type, row) { return row.description; }},
                { "data": "amount", "render": function(data, type, row) { return row.amount; }},
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
            <h6 class="m-0 font-weight-bold text-secondary">Policy & Conditions</h6>
            <div class="d-flex justify-content-between">
                <a href="#" data-toggle="modal" data-target="#add-modal" class="btn btn-outline-primary font-weight-bold">
                    <i class="fas fa-plus"></i>Add
                </a>
            </div>
        </div>
        @include('backoffice.expenses._modals')
        <div class="card-body">
            <div class="table-responsive table-sm">
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="expenses-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Invoice No.</th>
                            <th>Date</th>
                            <th>Supplier</th>
                            <th>Description</th>
                            <th>Amount</th>
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