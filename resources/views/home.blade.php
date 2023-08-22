@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!---
<div class="container-fluid">

    </!-- Page Heading --/>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-3">Welcome to OFiber Dashboard!</h2>
        </div>
    </div>

    </!-- Content Row --/>
    <div class="row">

        </!-- Earnings (Monthly) Card Example --/>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </!-- Earnings (Monthly) Card Example --/>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </!-- Earnings (Monthly) Card Example --/>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </!-- Pending Requests Card Example --/>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div> --->
    <div class="container-fluid">
        <!-- Active Router Info -->
        <div class="card shadow h-100 py-2 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="justify-content-center col-xl-2 col-md-4 m-auto pb-3">
                        @php
                                $router = \App\Models\Router::find(1);
                                if($router) {
                                    $value = $router->getSystemResource();
                                    $routerBoard = $router->getSystemRouterboard();
                                }
                                @endphp

                                <img class="justify-content-center" style="width: -webkit-fill-available;" src="{{asset('admin/img/mikrotik.png')}}" alt="...">
                                @if($router && $value)
                                    <center>
                                        <div class="justify-content-center text-success text-xs">CONNECTED</div>
                                    </center>
                                    <div class="justify-content-center m-0 font-weight-bold text-secondary">{{ $router->name }}</div>
                                @else
                                    <center>
                                        <div class="justify-content-center text-danger text-xs">DISCONNECTED - Er/C</div>
                                    </center>
                                @endif
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                            </div>
                            <div class="col ml-3">
                                <div class="text-xs text-dark text-uppercase mb-1">DateTime:
                                    {{ $date = date("M d, Y H:i:s") }}</div>
                                <div class="text-xs text-dark text-uppercase mb-1">Uptime:

                                    {{ $value ? $value['uptime'] : '' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-heartbeat fa-2x text-gray-300"></i>
                            </div>
                            <div class="col ml-3">
                                <div class="text-xs text-dark text-uppercase mb-1">Identity:

                                    {{ $router->name }}</div>
                                <div class="text-xs text-dark text-uppercase mb-1">CPU Load:
                                    {{ $value ? $value['cpu-load'] : '' }}</div>
                                <div class="text-xs text-dark text-uppercase mb-1">CPU Count:

                                    {{ $value ? $value['cpu-count'] : '' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-server fa-2x text-gray-300"></i>
                            </div>
                            <div class="col ml-3">
                                <div class="text-xs text-dark text-uppercase mb-1">Free Memory:
                                    {{ $value ? $value['free-memory'] : '' }}</div>
                                <div class="text-xs text-dark text-uppercase mb-1">Total Memory:
                                    {{ $value ? $value['total-memory'] : '' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                            </div>
                            <div class="col ml-3">
                                <div class="text-xs text-dark text-uppercase mb-1">Board Name:

                                    {{ $value ? $value['board-name'] : '' }}</div>
                                <div class="text-xs text-dark text-uppercase mb-1">RouterOS:

                                    {{ $value ? $value['version'] : '' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                            <div class="col ml-3">
                                <div class="text-xs text-dark text-uppercase mb-1">Model:

                                    {{ $routerBoard ? $routerBoard['model'] : '' }}</div>
                                <div class="text-xs text-dark text-uppercase mb-1">SN:

                                    {{ $routerBoard ? $routerBoard['serial-number'] : '' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="sidebar-divider">

        <div class="d-flex justify-content-end">
            <form class="user" action="dashboard.php" method="POST">
                <div class="d-flex justify-content-end mb-2">
                    <div style="margin-top:8px; margin-right:5px;font-size:0.7rem;">Filter:</div>
                    <select class="btn btn-white border form-control" style="text-align:left;width:110px;font-size:0.7rem;" name="filterYear" id="filterYear" onchange="this.form.submit()">
                        <option value="2023" selected="">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>
                    <select class="btn btn-white border form-control" style="text-align:left;width:110px;font-size:0.7rem;" name="filterMonth" id="filterMonth" onchange="this.form.submit()">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug" selected="">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-success text-uppercase mb-1">
                                    2023-Aug&nbsp;Collections</div>
                                <div class="h5 mb-0 text-gray-800 font-weight-bold">
                                    PHP 98,765.00                        </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-danger text-uppercase mb-1">
                                    2023-Aug&nbsp;Expenses</div>
                                <div class="h5 mb-0 text-gray-800 font-weight-bold">
                                    PHP 98,765.00                        </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-primary text-uppercase mb-1">
                                    2023-Aug&nbsp;Total Income</div>
                                <div class="h5 mb-0 text-gray-800 font-weight-bold">
                                    P 98,760.00                        </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-warning text-uppercase mb-1">
                                    License Validity</div>
                                <div class="h6 mb-0 text-gray-800 font-weight-bold">
                                    1y 2m 3d                        </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-key fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================================= -->
        <div class="row">
            <div class="col-xl-3 col-md-12 mb-2">
                <div class="card border-left-success shadow h-auto mb-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-success text-uppercase mb-1">
                                    2023-Aug&nbsp;TOTAL Installed</div>
                                <div class="h6 mb-0 text-gray-800 font-weight-bold">
                                    321</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-left-danger shadow h-auto mb-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-danger text-uppercase mb-1">
                                    2023-Aug&nbsp;TOTAL PULLOUT</div>
                                <div class="h6 mb-0 text-gray-800 font-weight-bold">
                                    123</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-minus fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-left-info shadow h-auto mb-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-info text-uppercase mb-1">
                                    TOTAL VOUCHERS</div>
                                <div class="h6 mb-0 text-gray-800 font-weight-bold">
                                    57</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-left-warning shadow h-auto mb-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-warning text-uppercase mb-1">
                                    TOTAL SUBSCRIPTIONS</div>
                                <div class="h6 mb-0 text-gray-800 font-weight-bold">1                        </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-md-12">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                <div class="row">
                    <div class="col-lg-8 col-md-12 mb-4">
                        <div class="w-100 border p-4 bg-white"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <h5 class="d-flex justify-content-center"><i class="fas fa-cash-register" style="opacity: 0.5;"></i>&nbsp;&nbsp;Total Collections</h5>
                            <div class="d-flex justify-content-center">
                                <a href="#" onclick="monthlyToggle()" class="text-decoration-none mx-2">Monthly</a>
                                <a href="#" onclick="weeklyToggle()" class="text-decoration-none mx-2">Weekly</a>
                                <a href="#" onclick="dailyToggle()" class="text-decoration-none mx-2">Daily</a>
                            </div>
                            <canvas id="monthly" style="display: none; width: 492px; max-width: 100%; height: 366px;" width="492" height="366" class="chartjs-render-monitor"></canvas>
                            <canvas id="weekly" style="display: block; width: 492px; max-width: 100%; height: 366px;" width="492" height="366" class="chartjs-render-monitor"></canvas>
                            <canvas id="daily" style="display: none; width: 492px; max-width: 100%; height: 366px;" width="492" height="366" class="chartjs-render-monitor"></canvas>
                            <script>
                                function monthlyToggle() {
                                    document.getElementById("monthly").style.display = "block";
                                    document.getElementById("weekly").style.display = "none";
                                    document.getElementById("daily").style.display = "none";
                                }
                            </script>
                            <script>
                                function weeklyToggle() {
                                    document.getElementById("monthly").style.display = "none";
                                    document.getElementById("weekly").style.display = "block";
                                    document.getElementById("daily").style.display = "none";
                                }
                            </script>
                            <script>
                                function dailyToggle() {
                                    document.getElementById("monthly").style.display = "none";
                                    document.getElementById("weekly").style.display = "none";
                                    document.getElementById("daily").style.display = "block";
                                }
                            </script>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="h-100 border p-4 bg-white">
                            <h6 class="d-flex justify-content-center mb-3"><i class="fas fa-handshake" style="opacity: 0.5;"></i>&nbsp;&nbsp;MODE OF PAYMENTS</h6>
                            <div style="font-size:0.7rem;"><span class="badge bg-info" style="width:2rem;">&nbsp;</span>&nbsp;CASHLESS: <strong>0</strong>
                            </div>
                            <div style="font-size:0.7rem;"><span class="badge bg-warning" style="width:2rem;">&nbsp;</span>&nbsp;CASH: <strong>0</strong></div>
                            <div class="progress mt-1 mb-4">
                                <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 0%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">0%</div>
                                <div class="progress-bar bg-warning" role="progressbar" aria-label="Segment two" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                            <h6 class="d-flex justify-content-center mb-3"><i class="fas fa-balance-scale" style="opacity: 0.5;"></i>&nbsp;&nbsp;TRANSACTION HISTORY</h6>
                            <div style="font-size:0.7rem;"><span class="badge bg-success" style="width:2rem;">&nbsp;</span>&nbsp;PAYMENT:
                                <strong>P1234.00</strong>
                            </div>
                            <div style="font-size:0.7rem;"><span class="badge bg-danger" style="width:2rem;">&nbsp;</span>&nbsp;CHARGES:
                                <strong>P4321.00</strong>
                            </div>
                            <div class="progress mt-1 mb-4">
                                <div class="progress-bar bg-success" role="progressbar" aria-label="Segment one" style="width: 0%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">0%</div>
                                <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment two" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                            <h6 class="d-flex justify-content-center mb-3"><i class="fas fa-calendar" style="opacity: 0.5;"></i>&nbsp;&nbsp; MONTH OF AUG 2023</h6>
                            <div style="font-size:0.7rem;"><span class="badge bg-primary" style="width:2rem;">&nbsp;</span>&nbsp;COLLECTIBLES:
                                <strong>P98,000.00</strong>
                            </div>
                            <div style="font-size:0.7rem;"><span class="badge bg-success" style="width:2rem;">&nbsp;</span>&nbsp;COLLECTED:
                                <strong>P876.00</strong>
                            </div>
                            <div style="font-size:0.7rem;"><span class="badge bg-danger" style="width:2rem;">&nbsp;</span>&nbsp;UNCOLLECTED:
                                <strong>P34,000.00</strong>
                            </div>
                            <div class="progress mt-1 mb-2">
                                <div class="progress-bar bg-success" role="progressbar" aria-label="Segment one" style="width: 0%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">0%</div>
                                <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment two" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr class="sidebar-divider">

        <div class="card shadow h-100 py-3 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-3">
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Active Billing:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-danger"></i>&nbsp;&nbsp;Inactive
                                    Billing:
                                    0                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-warning"></i>&nbsp;&nbsp;Floating Records:
                                    0                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-3">
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Enabled Subscribers:
                                    0                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-danger"></i>&nbsp;&nbsp;Disabled Subscribers:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Archived Subscribers:
                                    0                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-3">
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-primary"></i>&nbsp;&nbsp;Total Tickets:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-warning"></i>&nbsp;&nbsp;Opened Tickets:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Closed Tickets:
                                    0                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-3">
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Total Policies:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Total Scheduler:
                                    2                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Total Products:
                                    3                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-3">
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Total Subscribers:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Pinned Subscribers:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-danger"></i>&nbsp;&nbsp;Unpinned Subscribers:
                                    0                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 m-auto">
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-3">
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Total NAPs:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Pinned NAPs:
                                    1                        </div>
                                <div style="font-size:0.8rem;">
                                    <i class="far fa-circle text-danger"></i>&nbsp;&nbsp;Unpinned NAPs:
                                    0                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================================================================================================ -->
        <script>
            var xValues = ["Sep",
                "Oct",
                "Nov",
                "Dec",
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug"
            ];
            var yValues = [
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
            ];
            new Chart("monthly", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        label: "Collection",
                        lineTension: 0.3,
                        backgroundColor: "rgba(92, 184, 92, 0.8)",
                        borderColor: "rgba(92, 184, 92, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(92, 184, 92, 1)",
                        pointBorderColor: "rgba(92, 184, 92, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(92, 184, 92, 1)",
                        pointHoverBorderColor: "rgba(92, 184, 92, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 5                }
                        }],
                    }
                }
            });
        </script>
        <!-- ============================================================================================================================================ -->
        <script>
            var xValues = ["Wed",
                "Thu",
                "Fri",
                "Sat",
                "Sun",
                "Mon",
                "Tue"
            ];
            var yValues = [,
                ,
                ,
                ,
                ,
                ,
            ];
            new Chart("weekly", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        label: "Collection",
                        lineTension: 0.3,
                        backgroundColor: "rgba(92, 184, 92, 0.8)",
                        borderColor: "rgba(92, 184, 92, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(92, 184, 92, 1)",
                        pointBorderColor: "rgba(92, 184, 92, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(92, 184, 92, 1)",
                        pointHoverBorderColor: "rgba(92, 184, 92, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 5                }
                        }],
                    }
                }
            });
        </script>
        <!-- =================================================================================================================================================== -->
        <script>
            var xValues = ["00",
                "01",
                "02",
                "03",
                "04",
                "05",
                "06",
                "07",
                "08",
                "09",
                "10",
                "11",
                "12",
                "13",
                "14",
                "15",
                "16",
                "17",
                "18",
                "19",
                "20",
                "21",
                "22",
                "23"
            ];
            var yValues = [,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
                ,
            ];
            new Chart("daily", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        label: "Collection",
                        lineTension: 0.3,
                        backgroundColor: "rgba(92, 184, 92, 0.8)",
                        borderColor: "rgba(92, 184, 92, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(92, 184, 92, 1)",
                        pointBorderColor: "rgba(92, 184, 92, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(92, 184, 92, 1)",
                        pointHoverBorderColor: "rgba(92, 184, 92, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 5                }
                        }],
                    }
                }
            });
        </script>
    </div>
@endsection
