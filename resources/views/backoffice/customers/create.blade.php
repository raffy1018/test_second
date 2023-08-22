@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')
    <div class="container-fluid">
        <center>

            <form class="user border bg-white" action="{{ route('backoffice.subscriptions.customers.store') }}" method="POST" autocomplete="off">
                @include('backoffice.customers.form')

                <div class="modal-footer d-flex justify-content-center">
                    <a href="{{ route('backoffice.subscriptions.customers.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </center>
    </div>
@endsection
