@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')
    <div class="container-fluid">
        <h6 class="mb-4">
            <a class="text-decoration-none" href="{{ route('home') }}">Home</a> / Subscriptions / Add Customer
        </h6>
        <center>

            <form class="user border bg-white" action="{{ route('backoffice.subscriptions.add-records') }}" method="POST" autocomplete="off">
                @include('backoffice.subscriptions.records.form')

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </center>
    </div>
@endsection
