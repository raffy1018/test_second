@extends('layouts.app')

@section('title', 'Add Policy')

@section('content')
    <div class="container-fluid">
        <center>

            <form class="border bg-white mx-auto col-md-6 p-5" action="{{ route('backoffice.policy.store') }}" method="POST" autocomplete="off">
                @csrf

                @include('backoffice.policy.form')

                <div class="modal-footer d-flex justify-content-center">
                    <a href="{{ route('backoffice.policy.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </center>
    </div>
@endsection
