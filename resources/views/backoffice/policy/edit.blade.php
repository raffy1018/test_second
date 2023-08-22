@extends('layouts.app')

@section('title', 'Edit Policy'.$policy->name)

@section('content')
    <div class="container-fluid">
        <center>

            <form class="border bg-white mx-auto col-md-6 p-5" action="{{ route('backoffice.policy.update', $policy) }}" method="POST" autocomplete="off">
                @csrf
                @method('patch')

                @include('backoffice.policy.form')

                <div class="modal-footer d-flex justify-content-center">
                    <a href="{{ route('backoffice.policy.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </center>
    </div>
@endsection
