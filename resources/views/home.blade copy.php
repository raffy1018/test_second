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

    <div class="card shadow h-100 py-2 mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2 col-md-4 m-auto pb-3">
                    <center>
                        <img class="" width="120px" src="{{asset('admin/img/mikrotik.png')}}" alt="...">
                        <div class="text-success text-xs">CONNECTED</div>                </center>
                </div>
                <div class="col-xl-2 col-md-4 m-auto">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                        <div class="col ml-3">
                            <div class="text-xs text-dark text-uppercase mb-1">DateTime:

                                jul/20/2023
                                04:29:40</div>
                            <div class="text-xs text-dark text-uppercase mb-1">Uptime:

                                6d10:22:44</div>
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

                                MikroTik</div>
                            <div class="text-xs text-dark text-uppercase mb-1">CPU Load:
                                23%</div>
                            <div class="text-xs text-dark text-uppercase mb-1">CPU Count:

                                1 Core</div>
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
                                6.4 MB</div>
                            <div class="text-xs text-dark text-uppercase mb-1">Total Memory:
                                32 MB</div>
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

                                hAP lite</div>
                            <div class="text-xs text-dark text-uppercase mb-1">RouterOS:

                                7.8 (stable)</div>
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

                                RB941-2nD                        </div>
                            <div class="text-xs text-dark text-uppercase mb-1">SN:

                                7DE307A64FBB</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="sidebar-divider">

    <div class="row">
        <div class="col-xl-3 col-md-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-success text-uppercase mb-1">
                                Total Collections</div>
                            <div class="h5 mb-0 text-gray-800 font-weight-bold">
                                P 26,165.00                        </div>
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
                                Total Expenses</div>
                            <div class="h5 mb-0 text-gray-800 font-weight-bold">
                                P 90,000.00                        </div>
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
                                Total Income</div>
                            <div class="h5 mb-0 text-gray-800 font-weight-bold">
                                P -63,835.00                        </div>
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
                                0y 0m 1d                        </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-key fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-3 col-md-12 mb-2">
            <div class="card border-left-success shadow h-auto mb-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-success text-uppercase mb-1">
                                2023-Jul&nbsp;Collections</div>
                            <div class="h6 mb-0 text-gray-800 font-weight-bold">
                                P 11,515.00                        </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-left-danger shadow h-auto mb-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-danger text-uppercase mb-1">
                                2023-Jul&nbsp;Expenses</div>
                            <div class="h6 mb-0 text-gray-800 font-weight-bold">
                                PHP 0.00                        </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-left-info shadow h-auto mb-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-info text-uppercase mb-1">
                                Vouchers</div>
                            <div class="h6 mb-0 text-gray-800 font-weight-bold">
                                0                        </div>
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
                                Subscribers</div>
                            <div class="h6 mb-0 text-gray-800 font-weight-bold">10                        </div>
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
                        <canvas id="monthly" style="display: block; width: 535px; max-width: 100%; height: 366px;" width="535" height="366" class="chartjs-render-monitor"></canvas>
                        <canvas id="weekly" style="display: none; width: 535px; max-width: 100%; height: 366px;" width="535" height="366" class="chartjs-render-monitor"></canvas>
                        <canvas id="daily" style="display: none; width: 535px; max-width: 100%; height: 366px;" width="535" height="366" class="chartjs-render-monitor"></canvas>
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
                        <h6 class="d-flex justify-content-center mb-3"><i class="fas fa-handshake" style="opacity: 0.5;"></i>&nbsp;&nbsp;Mode of Payments</h6>
                        <div style="font-size:0.7rem;"><span class="badge bg-info" style="width:2rem;">&nbsp;</span>&nbsp;CASHLESS <strong>20</strong>
                        </div>
                        <div style="font-size:0.7rem;"><span class="badge bg-warning" style="width:2rem;">&nbsp;</span>&nbsp;CASH <strong>- 0</strong></div>
                        <div class="progress mt-1 mb-4">
                            <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">100%</div>
                            <div class="progress-bar bg-warning" role="progressbar" aria-label="Segment two" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <h6 class="d-flex justify-content-center mb-3"><i class="fas fa-balance-scale" style="opacity: 0.5;"></i>&nbsp;&nbsp;Transaction History</h6>
                        <div style="font-size:0.7rem;"><span class="badge bg-success" style="width:2rem;">&nbsp;</span>&nbsp;COLLECTED
                            <strong>- P0.00</strong>
                        </div>
                        <div style="font-size:0.7rem;"><span class="badge bg-danger" style="width:2rem;">&nbsp;</span>&nbsp;UNCOLLECTED
                            <strong>- P0.00</strong>
                        </div>
                        <div class="progress mt-1 mb-4">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Segment one" style="width: 0%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">0%</div>
                            <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment two" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <h6 class="d-flex justify-content-center mb-3"><i class="fas fa-calendar" style="opacity: 0.5;"></i>&nbsp;&nbsp; Month of Jul 2023</h6>
                        <div style="font-size:0.7rem;"><span class="badge bg-primary" style="width:2rem;">&nbsp;</span>&nbsp;COLLECTIBLES
                            <strong>- P0.00</strong>
                        </div>
                        <div style="font-size:0.7rem;"><span class="badge bg-success" style="width:2rem;">&nbsp;</span>&nbsp;COLLECTED
                            <strong>- P0.00</strong>
                        </div>
                        <div style="font-size:0.7rem;"><span class="badge bg-danger" style="width:2rem;">&nbsp;</span>&nbsp;UNCOLLECTED
                            <strong>- P0.00</strong>
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
                                0                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-danger"></i>&nbsp;&nbsp;Inactive
                                Billing:
                                9                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-warning"></i>&nbsp;&nbsp;Floating Records:
                                1                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 m-auto">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Enabled Subscribers:
                                9                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-danger"></i>&nbsp;&nbsp;Disabled Subscribers:
                                0                        </div>
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
                                4                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-warning"></i>&nbsp;&nbsp;Opened Tickets:
                                1                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Closed Tickets:
                                3                        </div>
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
                                0                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Total Products:
                                4                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 m-auto">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Total Subscribers:
                                10                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Pinned Subscribers:
                                0                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-danger"></i>&nbsp;&nbsp;Unpinned Subscribers:
                                10                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 m-auto">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-info"></i>&nbsp;&nbsp;Total NAPs:
                                3                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="far fa-circle text-success"></i>&nbsp;&nbsp;Pinned NAPs:
                                3                        </div>
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
        var xValues = ["Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul"
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
            14650,
            11515];
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
                            max: 26170                }
                    }],
                }
            }
        });
    </script>
    <!-- ============================================================================================================================================ -->
    <script>
        var xValues = ["Fri",
            "Sat",
            "Sun",
            "Mon",
            "Tue",
            "Wed",
            "Thu"
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
                            max: 11520                }
                    }],
                }
            }
        });
    </script>
    <!-- =================================================================================================================================================== -->
    <script>
        var xValues = ["05",
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
            "23",
            "00",
            "01",
            "02",
            "03",
            "04"
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
