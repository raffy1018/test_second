<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('backoffice.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">OFiber</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Active Router
    </div>

    <center>
        <div class="nav-item" style="width: 90%;display: block;">
            <select class="btn btn-white btn-sm border border-secondary form-control" style="text-align:left;width:100%;" name="active_router">
            <option selected disabled>-- Select one --</option>
                @foreach(\App\Models\Router::all() as $router)
                    @if(session('router_id') == $router->id)
                        <option value="{{ $router->id }}" class="text-sm-start" selected>{{ $router->name }}</option>
                    @else
                        <option value="{{ $router->id }}" class="text-sm-start">{{ $router->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </center>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('backoffice') || request()->is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('backoffice.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>


    <!-- Heading -->
    <div class="sidebar-heading">
        DATABASE
    </div>

    <li class="nav-item {{ request()->is('backoffice/subscriptions') || request()->is('backoffice/subscriptions/*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subscriptions" aria-expanded="true" aria-controls="subscriptions" >
            <i class="fas fa-users"></i>
            <span>Subscriptions</span>
        </a>
        <div id="subscriptions" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('backoffice.subscriptions.customers.create')}}" >Add Customer</a>
                <a class="collapse-item" href="{{route('backoffice.subscriptions.customers.index')}}" >Customer Records</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->is('backoffice/products') || request()->is('backoffice/products/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('backoffice.products.index') }}">
            <i class="fas fa-box-open"></i>
            <span class="nav-link-name">Products & Services</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('backoffice/policy') || request()->is('backoffice/policy/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('backoffice.policy.index') }}">
            <i class="fas fa-list-alt"></i>
            <span class="nav-link-name">Policy & Conditions</span>
        </a>
    </li>

    {{--<li class="nav-item {{ request()->is('backoffice/hotspot-wifi') || request()->is('backoffice/hotspot-wifi/*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo" >
            <i class="fas fa-wifi"></i>
            <span>Hotspot WiFi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" onclick="displayLoader()" href="{{route('backoffice.hotspot-wifi.vouchers.index')}}" >Vouchers</a>
                <a class="collapse-item" onclick="displayLoader()" href="{{route('backoffice.hotspot-wifi.rates.index')}}" >Piso Rates</a>
            </div>
        </div>
    </li>--}}

    <li class="nav-item {{ request()->is('backoffice/transactions') || request()->is('backoffice/transactions/*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
           aria-expanded="true" aria-controls="collapseTwo" >
            <i class="fa-fw fas fa-tags"></i>
            <span>Transactions</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('backoffice.transactions.payments.index') }}" ><span>History</span></a>
                <a class="collapse-item" href="{{ route('backoffice.transactions.expenses.index') }}" ><span>Expenses</span></a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->is('backoffice/tickets') || request()->is('backoffice/tickets/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('backoffice.tickets.index') }}" >
            <i class="fa-fw fas fa-folder"></i>
            <span>Support Tickets</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('backoffice/olt-devices') || request()->is('backoffice/olt-devices/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('backoffice.olt-devices.index') }}" >
            <i class="fa-fw fas fa-network-wired"></i>
            <span>PON Management</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item {{ request()->is('backoffice/routers') || request()->is('backoffice/routers/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('backoffice.routers.index') }}" >
            <i class="fa-fw fas fa-folder"></i>
            <span>Routers</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('backoffice/roles') || request()->is('backoffice/roles/*') ? 'active' : '' }}">
        <a class="nav-link" href="#" >
            <i class="fa-fw fas fa-folder"></i>
            <span>Roles</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('backoffice/permissions') || request()->is('backoffice/permissions/*') ? 'active' : '' }}">
        <a class="nav-link" href="#" >
            <i class="fa-fw fas fa-folder"></i>
            <span>Permissions</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('backoffice/users') || request()->is('backoffice/users/*') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <!-- <i class="fa-fw fas fa-folder"></i> -->
            <span>User Profile</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('backoffice/settings') || request()->is('backoffice/settings/*') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <!-- <i class="fa-fw fas fa-folder"></i> -->
            <span>Settings</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
           aria-expanded="true" aria-controls="collapseThree" >
            <i class="fas fa-cog"></i>
            <span>API Integration</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" onclick="displayLoader()" href="#" >Messaging</a>
                <a class="collapse-item" onclick="displayLoader()" href="#" >Scheduler</a>
                <a class="collapse-item" onclick="displayLoader()" href="#" >Settings</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
           aria-expanded="true" aria-controls="collapseSix" >
            <i class="fa-fw fas fa-list"></i>
            <span>Logs</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" onclick="displayLoader()" href="#" ><span>System Logs</span></a>
                <a class="collapse-item" onclick="displayLoader()" href="#" ><span>Activity Logs</span></a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        LINKS
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#" target="_blank"><i class="fa-fw fas fa-user"></i><span>Client Portal</span></a>
    </li>

        <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>

@push('scripts_after')
<script src="{{ asset('js/plugins/axios/axios.min.js') }}"></script>

<script type="text/javascript">
    $(document).on('change', '[name="active_router"]', function(event) {
        router_id = $(this).val();
        console.log(router_id);

        axios.post('{{ route("api.dashboard.active-router") }}', {
            '_token': '{{ csrf_token() }}',
            'router_id': router_id
        }).then(function(res) {
            //
        });
    });
</script>
@endpush