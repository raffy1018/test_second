@extends('layouts.app')

@section('title', 'Routers')

@section('content')

<div class="container-fluid">

    <!-- Rotuer Registration -->
    <div>
        <div class="d-flex justify-content-center mb-3 mt-5">
            <h3 class="m-0 font-weight-bold text-secondary">Router Registration </h3>
        </div>
        <div class="d-flex justify-content-center my-3">
            <a href="#" data-toggle="modal" data-target="#addModal" class="d-flex justify-content-center bg-succress text-decoration-none mx-1 font-weight-bold text-primary"><button type="button" class="btn btn-primary btn-sm rounded-pill"><span class="mx-3"><i class="fas fa-plus"></i>
                        Add</span></button></a>
        </div>
        <div class="d-flex justify-content-center">
            <h6 class="m-0 font-weight-bold text-secondary mb-2"><i class="fas fa-fw fa-info-circle"></i> Mikrotik Router
            </h6>
        </div>
        <div class="d-flex justify-content-center">
            <h6 class="m-0 font-weight-bold text-secondary mb-2"><i class="fas fa-fw fa-info-circle"></i> SSH Port Compliant
            </h6>
        </div>
    </div>

    @include('backoffice.routers._modals')

    @forelse(\App\Models\Router::all() as $router)
        <div class="d-flex justify-content-center pt-5">
            @if($router->status)
                @php
                $value = $router->getSystemResource();
                @endphp
                <!-- REGISTERED -->
                <div class="card w-auto d-flex">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <img width="100px" src="{{ asset('admin/img/mikrotik.png') }}" alt="...">
                        <div class="justify-content-center m-0 font-weight-bold text-secondary">{{ $router->name }}</div>
                        
                        @include('backoffice.routers._col_action')
                        
                    </div>
                    <div class="card-body">
                        <div class="border p-3">
                            <center><h3>Registered</h3></center>
                            <center><img class="mb-3" width="25%" src="{{asset("admin/img/check.png")}}" alt="..."></center>
                            <center><h6>Board Name: {{ $value['board-name'] }}</h6></center>
                            <center><h6>RouterOS Version: {{ $value['version'] }}</h6></center>
                            <center><h6>System Uptime: {{ $value['uptime'] }}</h6></center>
                            <center><h6>Build Time: {{ $value['build-time'] }}</h6></center>
                            <center><h6>Factory Software: {{ $value['factory-software'] }}</h6></center>
                            <center><h6>Processor: {{ $value['cpu'] }}</h6></center>
                            <center><h6>Architecture: {{ $value['architecture-name'] }}</h6></center>
                        </div>
                    </div>
                </div>

            @else
                <!-- NOT REGISTERD -->
                <div class="card w-auto d-flex pt-5">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <img width="100px" src="{{asset("admin/img/mikrotik.png")}}" alt="...">
                        <div class="justify-content-center m-0 font-weight-bold text-secondary">{{ $router->name }}</div>

                        @include('backoffice.routers._col_action')
                        
                    </div>
                    <div class="card-body">
                        <div class="border p-3">
                            <center><h3>Not Registered</h3></center>
                            <center><img class="mb-3" width="25%" src="{{asset("admin/img/cross.png")}}" alt="..."></center>
                            <center><h6 class="text-danger">Error: Connection to host is not established</h6></center>
                            <center><h6>Please check and verify Router Domain/Address</h6></center>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    @empty
        <div class="d-flex justify-content-center pt-5">
            <h4 class="font-weight-bold text-secondary">No Router Register</h4>
        </div>
    @endforelse

</div>
@endsection