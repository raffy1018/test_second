@extends('layouts.app')

@section('title', 'Permissions')

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
        $('#permissions-table').dataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "ajax": "{{ route('api.permissions.data') }}",
            "columns": [
                { "data": "id", "render": function(data, type, row) { return row.id; }},
                { "data": "name", "render": function(data, type, row) { return row.name; }},
                { "data": "description", "render": function(data, type, row) { return row.description; }},
                { "data": "created_at", "render": function(data, type, row) { return '<em class="font-size-sm text-muted">'+moment(data).format('MMM DD, YYYY h:mm A')+'</em>'; }},
                { "data": "col_action", "render": function(data, type, row) { return row.col_action; }}
            ]
        });
    </script>
@endsection

@section('content')

<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-secondary my-auto">Permissions</h6>
            <div class="d-flex justify-content-between">
                <a href="#" data-toggle="modal" data-target="#add-module-modal" class="bg-succress text-decoration-none mx-1 font-weight-bold text-primary">
                    <button type="button" class="btn btn-primary btn-sm" title="Add">
                        <span>
                            <i class="fas fa-plus"></i> Add Module
                        </span>
                    </button>
                </a>
                <a href="#" data-toggle="modal" data-target="#add-new-modal" class="bg-succress text-decoration-none mx-1 font-weight-bold text-primary">
                    <button type="button" class="btn btn-primary btn-sm" title="Add">
                        <span>
                            <i class="fas fa-plus"></i> Add New
                        </span>
                    </button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-sm">
                @include('backoffice.permissions._modals')
                <table class="table table-striped table-hover table-vcenter js-dataTable-full" id="permissions-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Permission</th>
                            <th>Description</th>
                            <th>Created</th>
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