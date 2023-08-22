@extends('layouts.app')

@section('title', 'Edit Role - '.$role->name)

@section('content')

    <div class="container-fluid">
    <form action="{{ route('backoffice.roles.update', $role) }}" method="POST" class="mx-5">
        @csrf
        @method('patch')
        <div class="w-50 mx-auto">
            @include('backoffice.roles._form')
            <div class="d-flex justify-content-center">
                <div class="mx-5">
                    <a class="btn btn-secondary" href="{{ route('backoffice.roles.index') }}">Cancel</a>
                </div>
                <div class="mx-5">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
