@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')

    <div class="container-fluid">
    <form action="{{ route('backoffice.roles.update', $role) }}" method="POST" class="mx-5">
        @csrf
        @method('patch')
        <div class="w-50 mx-auto">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control round-pill" id="name" name="name" value="{{ $role->name ? $role->name : '' }}" placeholder="Enter Role Name">
            </div>
            <div class="form-group">
                <label for="router">Router</label>
                <input type="text" class="form-control round-pill" id="router" name="router" value="{{ $role->router_id ? $role->router->name : '' }}" readonly="">
            </div>
            <table class="table table-bordered my-5">
                <thead>
                    <tr>
                        <th style="width:30%">Module</th>
                        <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Helper::getSystemPermissions() as $group => $systemPermissions)
                        <tr>
                            <th>{{ ucfirst($group) }}</th>
                            <td>

                                @foreach($systemPermissions as $permission)
                                    <input type="checkbox" id="permission-{{ $permission['id'] }}" name="permissions[{{ $permission['id'] }}]" {{ $permissions->contains($permission['id']) ? 'checked' : '' }}>
                                    <label for="permission-{{ $permission['id'] }}"> {{ ucfirst($permission['name']) }}</label><br>
                                @endforeach

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    {{--<form action="" method="POST">
        <div class="row">
            <div class="col-xl-3 col-md-12 mb-4">
                <!-- ######################################### DASHBOARD -->
                <input type="checkbox" id="dashboard" name="dashboard" value="yes" checked="">
                <label for="dashboard"> Dashboard</label><br>
                <!-- ######################################### SUBSCRIPTIONS -->
                <input type="checkbox" id="subscriptions" name="subscriptions" value="yes" checked="" onclick="subscriptionsFunction()">
                <label for="subscriptions"> Subscriptions</label><br>
                <input class="ml-4" type="checkbox" id="addcustomer" name="addcustomer" value="yes" checked="">
                <label for="addcustomer"> Add Customer</label><br>
                <input class="ml-4" type="checkbox" id="customerrecords" name="customerrecords" value="yes" checked="" onclick="customerrecordsFunction()">
                <label for="customerrecords"> Customer Records</label><br>

                <input class="ml-4" type="checkbox" id="listrecords" name="listrecords" value="yes" checked="" onclick="listrecordsFunction()">
                <label for="listrecords"> Current Records</label><br>
                <input class="ml-5" type="checkbox" id="migrate" name="migrate" value="yes" checked="">
                <label for="migrate"> Migrate</label><br>
                <input class="ml-5" type="checkbox" id="exportrecords" name="exportrecords" value="yes" checked="">
                <label for="exportrecords"> Export Records</label><br>
                <input class="ml-5" type="checkbox" id="clearrecords" name="clearrecords" value="yes" checked="">
                <label for="clearrecords"> Clear Records</label><br>
                <input class="ml-5" type="checkbox" id="accountdetails" name="accountdetails" value="yes" checked="">
                <label for="accountdetails"> Account Details</label><br>
                <input class="ml-5" type="checkbox" id="exportinvoice" name="exportinvoice" value="yes" checked="">
                <label for="exportinvoice"> Export Invoice</label><br>
                <input class="ml-5" type="checkbox" id="accountedit" name="accountedit" value="yes" checked="">
                <label for="accountedit"> Edit Account</label><br>
                <input class="ml-5" type="checkbox" id="statementaccount" name="statementaccount" value="yes" checked="">
                <label for="statementaccount"> Invoice Button</label><br>
                <input class="ml-5" type="checkbox" id="paymentaccount" name="paymentaccount" value="yes" checked="">
                <label for="paymentaccount"> Payment Button</label><br>
                <input class="ml-5" type="checkbox" id="deleteaccount" name="deleteaccount" value="yes" checked="">
                <label for="deleteaccount"> Delete Button</label><br>
                <input class="ml-5" type="checkbox" id="serviceaccount" name="serviceaccount" value="yes" checked="">
                <label for="serviceaccount"> Settings Button</label><br>
                <input class="ml-5" type="checkbox" id="billingaccount" name="billingaccount" value="yes" checked="">
                <label for="billingaccount"> Status Button</label><br>
                <input class="ml-5" type="checkbox" id="stateaccount" name="stateaccount" value="yes" checked="">
                <label for="stateaccount"> Enable/Disable Button</label><br>
                <input class="ml-5" type="checkbox" id="clearinvoice" name="clearinvoice" value="yes" checked="">
                <label for="clearinvoice"> Clear Invoice</label><br>
                <input class="ml-5" type="checkbox" id="deleteinvoice" name="deleteinvoice" value="yes" checked="">
                <label for="deleteinvoice"> Delete Invoice</label><br>


                <input class="ml-4" type="checkbox" id="archivedrecords" name="archivedrecords" value="yes" checked="" onclick="listarchivedFunction()">
                <label for="archivedrecords"> Archived Records</label><br>
                <input class="ml-5" type="checkbox" id="exportarchived" name="exportarchived" value="yes" checked="">
                <label for="exportarchived"> Export Archived</label><br>
                <input class="ml-5" type="checkbox" id="cleararchived" name="cleararchived" value="yes" checked="">
                <label for="cleararchived"> Clear Archived</label><br>
                <input class="ml-5" type="checkbox" id="archiveddetails" name="archiveddetails" value="yes" checked="">
                <label for="archiveddetails"> Archived Details</label><br>
                <input class="ml-5" type="checkbox" id="exportinvoicearchived" name="exportinvoicearchived" value="yes" checked="">
                <label for="exportinvoicearchived"> Export Invoice</label><br>
                <input class="ml-5" type="checkbox" id="statementaccountarchived" name="statementaccountarchived" value="yes" checked="">
                <label for="statementaccountarchived"> Invoice Button</label><br>
                <input class="ml-5" type="checkbox" id="paymentaccountarchived" name="paymentaccountarchived" value="yes" checked="">
                <label for="paymentaccountarchived"> Payment Button</label><br>
                <input class="ml-5" type="checkbox" id="deleteaccountarchived" name="deleteaccountarchived" value="yes" checked="">
                <label for="deleteaccountarchived"> Delete Button</label><br>
                <input class="ml-5" type="checkbox" id="clearinvoicearchived" name="clearinvoicearchived" value="yes" checked="">
                <label for="clearinvoicearchived"> Clear Invoice</label><br>
                <input class="ml-5" type="checkbox" id="deleteinvoicearchived" name="deleteinvoicearchived" value="yes" checked="">
                <label for="deleteinvoicearchived"> Delete Invoice</label><br>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
                <input class="ml-4" type="checkbox" id="products" name="products" value="yes" checked="" onclick="productsFunction()">
                <label for="products"> Products &amp; Services</label><br>
                <input class="ml-5" type="checkbox" id="addproducts" name="addproducts" value="yes" checked="">
                <label for="addproducts"> Add Products</label><br>
                <input class="ml-5" type="checkbox" id="editproducts" name="editproducts" value="yes" checked="">
                <label for="editproducts"> Edit Products</label><br>
                <input class="ml-5" type="checkbox" id="deleteproducts" name="deleteproducts" value="yes" checked="">
                <label for="deleteproducts"> Delete Products</label><br>
                <input class="ml-5" type="checkbox" id="clearproducts" name="clearproducts" value="yes" checked="">
                <label for="clearproducts"> Clear Products</label><br>

                <input class="ml-4" type="checkbox" id="policy" name="policy" value="yes" checked="" onclick="policyFunction()">
                <label for="policy"> Policy &amp; Conditions</label><br>
                <input class="ml-5" type="checkbox" id="addpolicy" name="addpolicy" value="yes" checked="">
                <label for="addpolicy"> Add Policy</label><br>
                <input class="ml-5" type="checkbox" id="editpolicy" name="editpolicy" value="yes" checked="">
                <label for="editpolicy"> Edit Policy</label><br>
                <input class="ml-5" type="checkbox" id="deletepolicy" name="deletepolicy" value="yes" checked="">
                <label for="deletepolicy"> Delete Policy</label><br>

                <!-- ######################################### MAP COVERAGE -->
                <input type="checkbox" id="clientportal" name="clientportal" value="yes" checked="">
                <label for="clientportal"> Map Coverage</label><br>

                <!-- ######################################### HOTSPOT WIFI -->
                <input type="checkbox" id="hotspot" name="hotspot" value="yes" checked="" onclick="hotspotFunction()">
                <label for="hotspot"> Hotspot WiFi</label><br>
                <input class="ml-4" type="checkbox" id="vouchers" name="vouchers" value="yes" checked="" onclick="vouchersFunction()">
                <label for="vouchers"> Vouchers</label><br>
                <input class="ml-5" type="checkbox" id="addsinglevoucher" name="addsinglevoucher" value="yes" checked="">
                <label for="addsinglevoucher"> Create Voucher</label><br>
                <input class="ml-5" type="checkbox" id="addbatchvoucher" name="addbatchvoucher" value="yes" checked="">
                <label for="addbatchvoucher"> Create Batch</label><br>
                <input class="ml-5" type="checkbox" id="deleteallvoucher" name="deleteallvoucher" value="yes" checked="">
                <label for="deleteallvoucher"> Delete Selected</label><br>
                <input class="ml-5" type="checkbox" id="exportvouchers" name="exportvouchers" value="yes" checked="">
                <label for="exportvouchers"> Export/Print Vouchers</label><br>
                <input class="ml-5" type="checkbox" id="resend" name="resend" value="yes" checked="">
                <label for="resend"> Resend Voucher</label><br>
                <input class="ml-5" type="checkbox" id="clearvoucher" name="clearvoucher" value="yes" checked="">
                <label for="clearvoucher"> Clear Voucher</label><br>
                <input class="ml-5" type="checkbox" id="deletesinglevoucher" name="deletesinglevoucher" value="yes" checked="">
                <label for="deletesinglevoucher"> Delete Voucher</label><br>
                <input class="ml-4" type="checkbox" id="pisorates" name="pisorates" value="yes" checked="" onclick="pisoratesFunction()">
                <label for="pisorates"> Piso Rates</label><br>
                <input class="ml-5" type="checkbox" id="addrates" name="addrates" value="yes" checked="">
                <label for="addrates"> Add Rates</label><br>
                <input class="ml-5" type="checkbox" id="clearrates" name="clearrates" value="yes" checked="">
                <label for="clearrates"> Clear Rates</label><br>
                <input class="ml-5" type="checkbox" id="editrates" name="editrates" value="yes" checked="">
                <label for="editrates"> Edit Rates</label><br>
                <input class="ml-5" type="checkbox" id="deleterates" name="deleterates" value="yes" checked="">
                <label for="deleterates"> Delete Rates</label><br>

                <!-- ######################################### TRANSACTIONS -->
                <input type="checkbox" id="transactions" name="transactions" value="yes" checked="" onclick="transactionsFunction()">
                <label for="transactions"> Transactions</label><br>
                <input class="ml-4" type="checkbox" id="history" name="history" value="yes" checked="" onclick="historyFunction()">
                <label for="history"> History</label><br>
                <input class="ml-5" type="checkbox" id="exportpayments" name="exportpayments" value="yes" checked="">
                <label for="exportpayments"> Export Payments</label><br>
                <input class="ml-5" type="checkbox" id="clearpayments" name="clearpayments" value="yes" checked="">
                <label for="clearpayments"> Clear Payments</label><br>
                <input class="ml-5" type="checkbox" id="deletepayments" name="deletepayments" value="yes" checked="">
                <label for="deletepayments"> Delete Payments</label><br>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
                <input class="ml-5" type="checkbox" id="exportcharges" name="exportcharges" value="yes" checked="">
                <label for="exportcharges"> Export Charges</label><br>
                <input class="ml-5" type="checkbox" id="clearcharges" name="clearcharges" value="yes" checked="">
                <label for="clearcharges"> Clear Charges</label><br>
                <input class="ml-5" type="checkbox" id="deletecharges" name="deletecharges" value="yes" checked="">
                <label for="deletecharges"> Delete Charges</label><br>
                <input class="ml-4" type="checkbox" id="expenses" name="expenses" value="yes" checked="" onclick="expensesFunction()">
                <label for="expenses"> Expenses</label><br>
                <input class="ml-5" type="checkbox" id="exportexpenses" name="exportexpenses" value="yes" checked="">
                <label for="exportexpenses"> Export Expenses</label><br>
                <input class="ml-5" type="checkbox" id="addexpenses" name="addexpenses" value="yes" checked="">
                <label for="addexpenses"> Add Expenses</label><br>
                <input class="ml-5" type="checkbox" id="clearexpenses" name="clearexpenses" value="yes" checked="">
                <label for="clearexpenses"> Clear Expenses</label><br>
                <input class="ml-5" type="checkbox" id="editexpenses" name="editexpenses" value="yes" checked="">
                <label for="editexpenses"> Edit Expenses</label><br>
                <input class="ml-5" type="checkbox" id="deleteexpenses" name="deleteexpenses" value="yes" checked="">
                <label for="deleteexpenses"> Delete Expenses</label><br>

                <!-- ######################################### SUPPORT TICKETS -->
                <input type="checkbox" id="supporttickets" name="supporttickets" value="yes" checked="" onclick="supportticketsFunction()">
                <label for="supporttickets"> Support Tickets</label><br>
                <input class="ml-4" type="checkbox" id="exporttickets" name="exporttickets" value="yes" checked="">
                <label for="exporttickets"> Export Tickets</label><br>
                <input class="ml-4" type="checkbox" id="addticket" name="addticket" value="yes" checked="">
                <label for="addticket"> Add Ticket</label><br>
                <input class="ml-4" type="checkbox" id="cleartickets" name="cleartickets" value="yes" checked="">
                <label for="cleartickets"> Clear Tickets</label><br>
                <input class="ml-4" type="checkbox" id="ticketdetails" name="ticketdetails" value="yes" checked="">
                <label for="ticketdetails"> Ticket Details</label><br>
                <input class="ml-4" type="checkbox" id="deleteticket" name="deleteticket" value="yes" checked="">
                <label for="deleteticket"> Delete Tickets</label><br>

                <!-- ######################################### PON MANAGEMENT -->
                <input type="checkbox" id="ponmanagement" name="ponmanagement" value="yes" checked="" onclick="ponmanagementFunction()">
                <label for="ponmanagement"> PON Management</label><br>
                <input class="ml-4" type="checkbox" id="addolt" name="addolt" value="yes" checked="">
                <label for="addolt"> Add OLT</label><br>
                <input class="ml-4" type="checkbox" id="editolt" name="editolt" value="yes" checked="">
                <label for="editolt"> Edit OLT</label><br>
                <input class="ml-4" type="checkbox" id="deleteolt" name="deleteolt" value="yes" checked="">
                <label for="deleteolt"> Delete OLT</label><br>
                <input class="ml-4" type="checkbox" id="clearolt" name="clearolt" value="yes" checked="">
                <label for="clearolt"> Clear OLT</label><br>
                <input class="ml-4" type="checkbox" id="oltdetails" name="oltdetails" value="yes" checked="">
                <label for="oltdetails"> OLT Details</label><br>
                <input class="ml-4" type="checkbox" id="addnap" name="addnap" value="yes" checked="">
                <label for="addnap"> Add NAP</label><br>
                <input class="ml-4" type="checkbox" id="editnap" name="editnap" value="yes" checked="">
                <label for="editnap"> Edit Nap</label><br>
                <input class="ml-4" type="checkbox" id="deletenap" name="deletenap" value="yes" checked="">
                <label for="deletenap"> Delete NAP</label><br>
                <input class="ml-4" type="checkbox" id="napdetails" name="napdetails" value="yes" checked="">
                <label for="napdetails"> NAP Details</label><br>

                <!-- ######################################### API INTEGRATION -->
                <input type="checkbox" id="apiintegration" name="apiintegration" value="yes" checked="" onclick="apiintegrationFunction()">
                <label for="apiintegration"> API Integration</label><br>
                <input class="ml-4" type="checkbox" id="messaging" name="messaging" value="yes" checked="" onclick="messagingFunction()">
                <label for="messaging"> Messaging</label><br>
                <input class="ml-5" type="checkbox" id="createmessage" name="createmessage" value="yes" checked="">
                <label for="createmessage"> Create Messages</label><br>
                <input class="ml-5" type="checkbox" id="clearoutbox" name="clearoutbox" value="yes" checked="">
                <label for="clearoutbox"> Clear Messages</label><br>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
                <input class="ml-5" type="checkbox" id="resendoutbox" name="resendoutbox" value="yes" checked="">
                <label for="resendoutbox"> Resend</label><br>
                <input class="ml-5" type="checkbox" id="deleteoutbox" name="deleteoutbox" value="yes" checked="">
                <label for="deleteoutbox"> Delete Messages</label><br>
                <input class="ml-4" type="checkbox" id="scheduler" name="scheduler" value="yes" checked="" onclick="schedulerFunction()">
                <label for="scheduler"> Scheduler</label><br>
                <input class="ml-5" type="checkbox" id="addscheduler" name="addscheduler" value="yes" checked="">
                <label for="addscheduler"> Add Scheduler</label><br>
                <input class="ml-5" type="checkbox" id="clearscheduler" name="clearscheduler" value="yes" checked="">
                <label for="clearscheduler"> Clear Scheduler</label><br>
                <input class="ml-5" type="checkbox" id="editscheduler" name="editscheduler" value="yes" checked="">
                <label for="editscheduler"> Edit Scheduler</label><br>
                <input class="ml-5" type="checkbox" id="deletescheduler" name="deletescheduler" value="yes" checked="">
                <label for="deletescheduler"> Delete Scheduler</label><br>
                <input class="ml-4" type="checkbox" id="apisettings" name="apisettings" value="yes" checked="">
                <label for="apisettings"> API Settings</label><br>

                <!-- ######################################### SETTINGS -->
                <input type="checkbox" id="settings" name="settings" value="yes" checked="" onclick="settingsFunction()">
                <label for="settings"> Settings</label><br>
                <input class="ml-4" type="checkbox" id="mikrotik" name="mikrotik" value="yes" checked="">
                <label for="mikrotik"> MikroTik</label><br>
                <input class="ml-4" type="checkbox" id="userprofile" name="userprofile" value="yes" checked="" onclick="userprofileFunction()">
                <label for="userprofile"> User Profile</label><br>
                <input class="ml-5" type="checkbox" id="adduser" name="adduser" value="yes" checked="">
                <label for="adduser"> Add User</label><br>
                <input class="ml-5" type="checkbox" id="userdetails" name="userdetails" value="yes" checked="">
                <label for="userdetails"> Toggle Button</label><br>
                <input class="ml-5" type="checkbox" id="edituser" name="edituser" value="yes" checked="">
                <label for="edituser"> Edit User</label><br>
                <input class="ml-5" type="checkbox" id="deleteuser" name="deleteuser" value="yes" checked="">
                <label for="deleteuser"> Delete User</label><br>
                <input class="ml-5" type="checkbox" id="addprofile" name="addprofile" value="yes" checked="">
                <label for="addprofile"> Add Profile</label><br>
                <input class="ml-5" type="checkbox" id="editprofile" name="editprofile" value="yes" checked="">
                <label for="editprofile"> Edit Profile</label><br>
                <input class="ml-5" type="checkbox" id="deleteprofile" name="deleteprofile" value="yes" checked="">
                <label for="deleteprofile"> Delete Profile</label><br>

                <!-- ######################################### LOGS -->
                <input type="checkbox" id="logs" name="logs" value="yes" checked="" onclick="logsFunction()">
                <label for="logs"> Logs</label><br>
                <input class="ml-4" type="checkbox" id="systemlogs" name="systemlogs" value="yes" checked="" onclick="systemlogsFunction()">
                <label for="systemlogs"> System Logs</label><br>
                <input class="ml-5" type="checkbox" id="exportsystemlogs" name="exportsystemlogs" value="yes" checked="">
                <label for="exportsystemlogs"> Export System Logs</label><br>
                <input class="ml-5" type="checkbox" id="clearsystemlogs" name="clearsystemlogs" value="yes" checked="">
                <label for="clearsystemlogs"> Clear System Logs</label><br>
                <input class="ml-4" type="checkbox" id="activitylogs" name="activitylogs" value="yes" checked="" onclick="activitylogsFunction()">
                <label for="activitylogs"> Activity Logs</label><br>
                <input class="ml-5" type="checkbox" id="exportactivitylogs" name="exportactivitylogs" value="yes" checked="">
                <label for="exportactivitylogs"> Export Activity Logs</label><br>
                <input class="ml-5" type="checkbox" id="addactivitylogs" name="addactivitylogs" value="yes" checked="">
                <label for="addactivitylogs"> Add Activity Logs</label><br>
                <input class="ml-5" type="checkbox" id="clearactivitylogs" name="clearactivitylogs" value="yes" checked="">
                <label for="clearactivitylogs"> Clear Activity Logs</label><br>
                <input class="ml-5" type="checkbox" id="editactivitylogs" name="editactivitylogs" value="yes" checked="">
                <label for="editactivitylogs"> Edit Activity Logs</label><br>
                <input class="ml-5" type="checkbox" id="deleteactivitylogs" name="deleteactivitylogs" value="yes" checked="">
                <label for="deleteactivitylogs"> Delete Activity Logs</label><br>

            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <a class="btn btn-secondary" href="{{route("settings.staffProfile")}}">Cancel</a>
            <button type="submit" onclick="displayLoader()" class="btn btn-primary" name="submit">Update</button>
        </div>
    </form>--}}

    <script>
        document.getElementById("subscriptions");
        if (document.getElementById("subscriptions").checked == false) {
            document.getElementById("addcustomer").disabled = true;
            document.getElementById("customerrecords").disabled = true;
            document.getElementById("listrecords").disabled = true;
            document.getElementById("migrate").disabled = true;
            document.getElementById("exportrecords").disabled = true;
            document.getElementById("clearrecords").disabled = true;
            document.getElementById("accountdetails").disabled = true;
            document.getElementById("exportinvoice").disabled = true;
            document.getElementById("accountedit").disabled = true;
            document.getElementById("statementaccount").disabled = true;
            document.getElementById("paymentaccount").disabled = true;
            document.getElementById("deleteaccount").disabled = true;
            document.getElementById("serviceaccount").disabled = true;
            document.getElementById("billingaccount").disabled = true;
            document.getElementById("stateaccount").disabled = true;
            document.getElementById("clearinvoice").disabled = true;
            document.getElementById("deleteinvoice").disabled = true;
            document.getElementById("archivedrecords").disabled = true;
            document.getElementById("exportarchived").disabled = true;
            document.getElementById("cleararchived").disabled = true;
            document.getElementById("archiveddetails").disabled = true;
            document.getElementById("exportinvoicearchived").disabled = true;
            document.getElementById("statementaccountarchived").disabled = true;
            document.getElementById("paymentaccountarchived").disabled = true;
            document.getElementById("deleteaccountarchived").disabled = true;
            document.getElementById("clearinvoicearchived").disabled = true;
            document.getElementById("deleteinvoicearchived").disabled = true;
            document.getElementById("products").disabled = true;
            document.getElementById("addproducts").disabled = true;
            document.getElementById("editproducts").disabled = true;
            document.getElementById("deleteproducts").disabled = true;
            document.getElementById("clearproducts").disabled = true;
            document.getElementById("policy").disabled = true;
            document.getElementById("addpolicy").disabled = true;
            document.getElementById("editpolicy").disabled = true;
            document.getElementById("deletepolicy").disabled = true;
        }
        document.getElementById("customerrecords");
        if (document.getElementById("customerrecords").checked == false) {
            document.getElementById("listrecords").disabled = true;
            document.getElementById("migrate").disabled = true;
            document.getElementById("exportrecords").disabled = true;
            document.getElementById("clearrecords").disabled = true;
            document.getElementById("accountdetails").disabled = true;
            document.getElementById("exportinvoice").disabled = true;
            document.getElementById("accountedit").disabled = true;
            document.getElementById("statementaccount").disabled = true;
            document.getElementById("paymentaccount").disabled = true;
            document.getElementById("deleteaccount").disabled = true;
            document.getElementById("serviceaccount").disabled = true;
            document.getElementById("billingaccount").disabled = true;
            document.getElementById("stateaccount").disabled = true;
            document.getElementById("clearinvoice").disabled = true;
            document.getElementById("deleteinvoice").disabled = true;
            document.getElementById("archivedrecords").disabled = true;
            document.getElementById("exportarchived").disabled = true;
            document.getElementById("cleararchived").disabled = true;
            document.getElementById("archiveddetails").disabled = true;
            document.getElementById("exportinvoicearchived").disabled = true;
            document.getElementById("statementaccountarchived").disabled = true;
            document.getElementById("paymentaccountarchived").disabled = true;
            document.getElementById("deleteaccountarchived").disabled = true;
            document.getElementById("clearinvoicearchived").disabled = true;
            document.getElementById("deleteinvoicearchived").disabled = true;
        }
        document.getElementById("listrecords");
        if (document.getElementById("listrecords").checked == false) {
            document.getElementById("migrate").disabled = true;
            document.getElementById("exportrecords").disabled = true;
            document.getElementById("clearrecords").disabled = true;
            document.getElementById("accountdetails").disabled = true;
            document.getElementById("exportinvoice").disabled = true;
            document.getElementById("accountedit").disabled = true;
            document.getElementById("statementaccount").disabled = true;
            document.getElementById("paymentaccount").disabled = true;
            document.getElementById("deleteaccount").disabled = true;
            document.getElementById("serviceaccount").disabled = true;
            document.getElementById("billingaccount").disabled = true;
            document.getElementById("stateaccount").disabled = true;
            document.getElementById("clearinvoice").disabled = true;
            document.getElementById("deleteinvoice").disabled = true;
        }


        document.getElementById("archivedrecords");
        if (document.getElementById("archivedrecords").checked == false) {
            document.getElementById("exportarchived").disabled = true;
            document.getElementById("cleararchived").disabled = true;
            document.getElementById("archiveddetails").disabled = true;
            document.getElementById("exportinvoicearchived").disabled = true;
            document.getElementById("statementaccountarchived").disabled = true;
            document.getElementById("paymentaccountarchived").disabled = true;
            document.getElementById("deleteaccountarchived").disabled = true;
            document.getElementById("clearinvoicearchived").disabled = true;
            document.getElementById("deleteinvoicearchived").disabled = true;
        }

        document.getElementById("products");
        if (document.getElementById("products").checked == false) {
            document.getElementById("addproducts").disabled = true;
            document.getElementById("editproducts").disabled = true;
            document.getElementById("deleteproducts").disabled = true;
            document.getElementById("clearproducts").disabled = true;
        }

        document.getElementById("policy");
        if (document.getElementById("policy").checked == false) {
            document.getElementById("addpolicy").disabled = true;
            document.getElementById("editpolicy").disabled = true;
            document.getElementById("deletepolicy").disabled = true;
        }
        document.getElementById("hotspot");
        if (document.getElementById("hotspot").checked == false) {
            document.getElementById("vouchers").disabled = true;
            document.getElementById("addsinglevoucher").disabled = true;
            document.getElementById("addbatchvoucher").disabled = true;
            document.getElementById("deleteallvoucher").disabled = true;
            document.getElementById("exportvouchers").disabled = true;
            document.getElementById("resend").disabled = true;
            document.getElementById("deletesinglevoucher").disabled = true;
            document.getElementById("clearvoucher").disabled = true;
            document.getElementById("pisorates").disabled = true;
            document.getElementById("addrates").disabled = true;
            document.getElementById("clearrates").disabled = true;
            document.getElementById("editrates").disabled = true;
            document.getElementById("deleterates").disabled = true;
        }
        document.getElementById("vouchers");
        if (document.getElementById("vouchers").checked == false) {
            document.getElementById("addsinglevoucher").disabled = true;
            document.getElementById("addbatchvoucher").disabled = true;
            document.getElementById("deleteallvoucher").disabled = true;
            document.getElementById("exportvouchers").disabled = true;
            document.getElementById("resend").disabled = true;
            document.getElementById("deletesinglevoucher").disabled = true;
            document.getElementById("clearvoucher").disabled = true;
        }
        document.getElementById("pisorates");
        if (document.getElementById("pisorates").checked == false) {
            document.getElementById("addrates").disabled = true;
            document.getElementById("clearrates").disabled = true;
            document.getElementById("editrates").disabled = true;
            document.getElementById("deleterates").disabled = true;
        }
        document.getElementById("transactions");
        if (document.getElementById("transactions").checked == false) {
            document.getElementById("history").disabled = true;
            document.getElementById("exportpayments").disabled = true;
            document.getElementById("clearpayments").disabled = true;
            document.getElementById("deletepayments").disabled = true;
            document.getElementById("exportcharges").disabled = true;
            document.getElementById("clearcharges").disabled = true;
            document.getElementById("deletecharges").disabled = true;
            document.getElementById("expenses").disabled = true;
            document.getElementById("exportexpenses").disabled = true;
            document.getElementById("addexpenses").disabled = true;
            document.getElementById("clearexpenses").disabled = true;
            document.getElementById("editexpenses").disabled = true;
            document.getElementById("deleteexpenses").disabled = true;
        }
        document.getElementById("history");
        if (document.getElementById("history").checked == false) {
            document.getElementById("exportpayments").disabled = true;
            document.getElementById("clearpayments").disabled = true;
            document.getElementById("deletepayments").disabled = true;
            document.getElementById("exportcharges").disabled = true;
            document.getElementById("clearcharges").disabled = true;
            document.getElementById("deletecharges").disabled = true;
        }
        document.getElementById("expenses");
        if (document.getElementById("expenses").checked == false) {
            document.getElementById("exportexpenses").disabled = true;
            document.getElementById("addexpenses").disabled = true;
            document.getElementById("clearexpenses").disabled = true;
            document.getElementById("editexpenses").disabled = true;
            document.getElementById("deleteexpenses").disabled = true;
        }
        document.getElementById("supporttickets");
        if (document.getElementById("supporttickets").checked == false) {
            document.getElementById("exporttickets").disabled = true;
            document.getElementById("addticket").disabled = true;
            document.getElementById("cleartickets").disabled = true;
            document.getElementById("ticketdetails").disabled = true;
            document.getElementById("deleteticket").disabled = true;
        }
        document.getElementById("ponmanagement");
        if (document.getElementById("ponmanagement").checked == false) {
            document.getElementById("addolt").disabled = true;
            document.getElementById("editolt").disabled = true;
            document.getElementById("deleteolt").disabled = true;
            document.getElementById("clearolt").disabled = true;
            document.getElementById("oltdetails").disabled = true;
            document.getElementById("addnap").disabled = true;
            document.getElementById("editnap").disabled = true;
            document.getElementById("deletenap").disabled = true;
            document.getElementById("napdetails").disabled = true;
        }
        document.getElementById("apiintegration");
        if (document.getElementById("apiintegration").checked == false) {
            document.getElementById("messaging").disabled = true;
            document.getElementById("createmessage").disabled = true;
            document.getElementById("clearoutbox").disabled = true;
            document.getElementById("resendoutbox").disabled = true;
            document.getElementById("deleteoutbox").disabled = true;
            document.getElementById("scheduler").disabled = true;
            document.getElementById("addscheduler").disabled = true;
            document.getElementById("clearscheduler").disabled = true;
            document.getElementById("editscheduler").disabled = true;
            document.getElementById("deletescheduler").disabled = true;
            document.getElementById("apisettings").disabled = true;
        }
        document.getElementById("messaging");
        if (document.getElementById("messaging").checked == false) {
            document.getElementById("createmessage").disabled = true;
            document.getElementById("clearoutbox").disabled = true;
            document.getElementById("resendoutbox").disabled = true;
            document.getElementById("deleteoutbox").disabled = true;
        }
        document.getElementById("scheduler");
        if (document.getElementById("scheduler").checked == false) {
            document.getElementById("addscheduler").disabled = true;
            document.getElementById("clearscheduler").disabled = true;
            document.getElementById("editscheduler").disabled = true;
            document.getElementById("deletescheduler").disabled = true;
        }
        document.getElementById("settings");
        if (document.getElementById("settings").checked == false) {
            document.getElementById("mikrotik").disabled = true;
            document.getElementById("userprofile").disabled = true;
            document.getElementById("adduser").disabled = true;
            document.getElementById("userdetails").disabled = true;
            document.getElementById("edituser").disabled = true;
            document.getElementById("deleteuser").disabled = true;
            document.getElementById("addprofile").disabled = true;
            document.getElementById("editprofile").disabled = true;
            document.getElementById("deleteprofile").disabled = true;
        }
        document.getElementById("userprofile");
        if (document.getElementById("userprofile").checked == false) {
            document.getElementById("adduser").disabled = true;
            document.getElementById("userdetails").disabled = true;
            document.getElementById("edituser").disabled = true;
            document.getElementById("deleteuser").disabled = true;
            document.getElementById("addprofile").disabled = true;
            document.getElementById("editprofile").disabled = true;
            document.getElementById("deleteprofile").disabled = true;
        }
        document.getElementById("logs");
        if (document.getElementById("logs").checked == false) {
            document.getElementById("systemlogs").disabled = true;
            document.getElementById("exportsystemlogs").disabled = true;
            document.getElementById("clearsystemlogs").disabled = true;
            document.getElementById("activitylogs").disabled = true;
            document.getElementById("exportactivitylogs").disabled = true;
            document.getElementById("addactivitylogs").disabled = true;
            document.getElementById("clearactivitylogs").disabled = true;
            document.getElementById("editactivitylogs").disabled = true;
            document.getElementById("deleteactivitylogs").disabled = true;
        }
        document.getElementById("systemlogs");
        if (document.getElementById("systemlogs").checked == false) {
            document.getElementById("exportsystemlogs").disabled = true;
            document.getElementById("clearsystemlogs").disabled = true;
        }
        document.getElementById("activitylogs");
        if (document.getElementById("activitylogs").checked == false) {
            document.getElementById("exportactivitylogs").disabled = true;
            document.getElementById("addactivitylogs").disabled = true;
            document.getElementById("clearactivitylogs").disabled = true;
            document.getElementById("editactivitylogs").disabled = true;
            document.getElementById("deleteactivitylogs").disabled = true;
        }
    </script>


    <script>
        function subscriptionsFunction() {
            document.getElementById("subscriptions");
            if (document.getElementById("subscriptions").checked == true) {
                document.getElementById("addcustomer").checked = true;
                document.getElementById("customerrecords").checked = true;
                document.getElementById("listrecords").checked = true;
                document.getElementById("migrate").checked = true;
                document.getElementById("exportrecords").checked = true;
                document.getElementById("clearrecords").checked = true;
                document.getElementById("accountdetails").checked = true;
                document.getElementById("exportinvoice").checked = true;
                document.getElementById("accountedit").checked = true;
                document.getElementById("statementaccount").checked = true;
                document.getElementById("paymentaccount").checked = true;
                document.getElementById("deleteaccount").checked = true;
                document.getElementById("serviceaccount").checked = true;
                document.getElementById("billingaccount").checked = true;
                document.getElementById("stateaccount").checked = true;
                document.getElementById("clearinvoice").checked = true;
                document.getElementById("deleteinvoice").checked = true;
                document.getElementById("archivedrecords").checked = true;
                document.getElementById("exportarchived").checked = true;
                document.getElementById("cleararchived").checked = true;
                document.getElementById("archiveddetails").checked = true;
                document.getElementById("exportinvoicearchived").checked = true;
                document.getElementById("statementaccountarchived").checked = true;
                document.getElementById("paymentaccountarchived").checked = true;
                document.getElementById("deleteaccountarchived").checked = true;
                document.getElementById("clearinvoicearchived").checked = true;
                document.getElementById("deleteinvoicearchived").checked = true;
                document.getElementById("products").checked = true;
                document.getElementById("addproducts").checked = true;
                document.getElementById("editproducts").checked = true;
                document.getElementById("deleteproducts").checked = true;
                document.getElementById("clearproducts").checked = true;
                document.getElementById("policy").checked = true;
                document.getElementById("addpolicy").checked = true;
                document.getElementById("editpolicy").checked = true;
                document.getElementById("deletepolicy").checked = true;

                document.getElementById("addcustomer").disabled = false;
                document.getElementById("customerrecords").disabled = false;
                document.getElementById("listrecords").disabled = false;
                document.getElementById("migrate").disabled = false;
                document.getElementById("exportrecords").disabled = false;
                document.getElementById("clearrecords").disabled = false;
                document.getElementById("accountdetails").disabled = false;
                document.getElementById("exportinvoice").disabled = false;
                document.getElementById("accountedit").disabled = false;
                document.getElementById("statementaccount").disabled = false;
                document.getElementById("paymentaccount").disabled = false;
                document.getElementById("deleteaccount").disabled = false;
                document.getElementById("serviceaccount").disabled = false;
                document.getElementById("billingaccount").disabled = false;
                document.getElementById("stateaccount").disabled = false;
                document.getElementById("clearinvoice").disabled = false;
                document.getElementById("deleteinvoice").disabled = false;
                document.getElementById("archivedrecords").disabled = false;
                document.getElementById("exportarchived").disabled = false;
                document.getElementById("cleararchived").disabled = false;
                document.getElementById("archiveddetails").disabled = false;
                document.getElementById("exportinvoicearchived").disabled = false;
                document.getElementById("statementaccountarchived").disabled = false;
                document.getElementById("paymentaccountarchived").disabled = false;
                document.getElementById("deleteaccountarchived").disabled = false;
                document.getElementById("clearinvoicearchived").disabled = false;
                document.getElementById("deleteinvoicearchived").disabled = false;
                document.getElementById("products").disabled = false;
                document.getElementById("addproducts").disabled = false;
                document.getElementById("editproducts").disabled = false;
                document.getElementById("deleteproducts").disabled = false;
                document.getElementById("clearproducts").disabled = false;
                document.getElementById("policy").disabled = false;
                document.getElementById("addpolicy").disabled = false;
                document.getElementById("editpolicy").disabled = false;
                document.getElementById("deletepolicy").disabled = false;
            } else {
                document.getElementById("addcustomer").checked = false;
                document.getElementById("customerrecords").checked = false;
                document.getElementById("listrecords").checked = false;
                document.getElementById("migrate").checked = false;
                document.getElementById("exportrecords").checked = false;
                document.getElementById("clearrecords").checked = false;
                document.getElementById("accountdetails").checked = false;
                document.getElementById("exportinvoice").checked = false;
                document.getElementById("accountedit").checked = false;
                document.getElementById("statementaccount").checked = false;
                document.getElementById("paymentaccount").checked = false;
                document.getElementById("deleteaccount").checked = false;
                document.getElementById("serviceaccount").checked = false;
                document.getElementById("billingaccount").checked = false;
                document.getElementById("stateaccount").checked = false;
                document.getElementById("clearinvoice").checked = false;
                document.getElementById("deleteinvoice").checked = false;
                document.getElementById("archivedrecords").checked = false;
                document.getElementById("exportarchived").checked = false;
                document.getElementById("cleararchived").checked = false;
                document.getElementById("archiveddetails").checked = false;
                document.getElementById("exportinvoicearchived").checked = false;
                document.getElementById("statementaccountarchived").checked = false;
                document.getElementById("paymentaccountarchived").checked = false;
                document.getElementById("deleteaccountarchived").checked = false;
                document.getElementById("clearinvoicearchived").checked = false;
                document.getElementById("deleteinvoicearchived").checked = false;
                document.getElementById("products").checked = false;
                document.getElementById("addproducts").checked = false;
                document.getElementById("editproducts").checked = false;
                document.getElementById("deleteproducts").checked = false;
                document.getElementById("clearproducts").checked = false;
                document.getElementById("policy").checked = false;
                document.getElementById("addpolicy").checked = false;
                document.getElementById("editpolicy").checked = false;
                document.getElementById("deletepolicy").checked = false;

                document.getElementById("addcustomer").disabled = true;
                document.getElementById("customerrecords").disabled = true;
                document.getElementById("listrecords").disabled = true;
                document.getElementById("migrate").disabled = true;
                document.getElementById("exportrecords").disabled = true;
                document.getElementById("clearrecords").disabled = true;
                document.getElementById("accountdetails").disabled = true;
                document.getElementById("exportinvoice").disabled = true;
                document.getElementById("accountedit").disabled = true;
                document.getElementById("statementaccount").disabled = true;
                document.getElementById("paymentaccount").disabled = true;
                document.getElementById("deleteaccount").disabled = true;
                document.getElementById("serviceaccount").disabled = true;
                document.getElementById("billingaccount").disabled = true;
                document.getElementById("stateaccount").disabled = true;
                document.getElementById("clearinvoice").disabled = true;
                document.getElementById("deleteinvoice").disabled = true;
                document.getElementById("archivedrecords").disabled = true;
                document.getElementById("exportarchived").disabled = true;
                document.getElementById("cleararchived").disabled = true;
                document.getElementById("archiveddetails").disabled = true;
                document.getElementById("exportinvoicearchived").disabled = true;
                document.getElementById("statementaccountarchived").disabled = true;
                document.getElementById("paymentaccountarchived").disabled = true;
                document.getElementById("deleteaccountarchived").disabled = true;
                document.getElementById("clearinvoicearchived").disabled = true;
                document.getElementById("deleteinvoicearchived").disabled = true;
                document.getElementById("products").disabled = true;
                document.getElementById("addproducts").disabled = true;
                document.getElementById("editproducts").disabled = true;
                document.getElementById("deleteproducts").disabled = true;
                document.getElementById("clearproducts").disabled = true;
                document.getElementById("policy").disabled = true;
                document.getElementById("addpolicy").disabled = true;
                document.getElementById("editpolicy").disabled = true;
                document.getElementById("deletepolicy").disabled = true;
            }
        }
    </script>
    <script>
        function customerrecordsFunction() {
            document.getElementById("customerrecords");
            if (document.getElementById("customerrecords").checked == true) {
                document.getElementById("listrecords").checked = true;
                document.getElementById("migrate").checked = true;
                document.getElementById("exportrecords").checked = true;
                document.getElementById("clearrecords").checked = true;
                document.getElementById("accountdetails").checked = true;
                document.getElementById("exportinvoice").checked = true;
                document.getElementById("accountedit").checked = true;
                document.getElementById("statementaccount").checked = true;
                document.getElementById("paymentaccount").checked = true;
                document.getElementById("deleteaccount").checked = true;
                document.getElementById("serviceaccount").checked = true;
                document.getElementById("billingaccount").checked = true;
                document.getElementById("stateaccount").checked = true;
                document.getElementById("clearinvoice").checked = true;
                document.getElementById("deleteinvoice").checked = true;
                document.getElementById("archivedrecords").checked = true;
                document.getElementById("exportarchived").checked = true;
                document.getElementById("cleararchived").checked = true;
                document.getElementById("archiveddetails").checked = true;
                document.getElementById("exportinvoicearchived").checked = true;
                document.getElementById("statementaccountarchived").checked = true;
                document.getElementById("paymentaccountarchived").checked = true;
                document.getElementById("deleteaccountarchived").checked = true;
                document.getElementById("clearinvoicearchived").checked = true;
                document.getElementById("deleteinvoicearchived").checked = true;

                document.getElementById("listrecords").disabled = false;
                document.getElementById("migrate").disabled = false;
                document.getElementById("exportrecords").disabled = false;
                document.getElementById("clearrecords").disabled = false;
                document.getElementById("accountdetails").disabled = false;
                document.getElementById("exportinvoice").disabled = false;
                document.getElementById("accountedit").disabled = false;
                document.getElementById("statementaccount").disabled = false;
                document.getElementById("paymentaccount").disabled = false;
                document.getElementById("deleteaccount").disabled = false;
                document.getElementById("serviceaccount").disabled = false;
                document.getElementById("billingaccount").disabled = false;
                document.getElementById("stateaccount").disabled = false;
                document.getElementById("clearinvoice").disabled = false;
                document.getElementById("deleteinvoice").disabled = false;
                document.getElementById("archivedrecords").disabled = false;
                document.getElementById("exportarchived").disabled = false;
                document.getElementById("cleararchived").disabled = false;
                document.getElementById("archiveddetails").disabled = false;
                document.getElementById("exportinvoicearchived").disabled = false;
                document.getElementById("statementaccountarchived").disabled = false;
                document.getElementById("paymentaccountarchived").disabled = false;
                document.getElementById("deleteaccountarchived").disabled = false;
                document.getElementById("clearinvoicearchived").disabled = false;
                document.getElementById("deleteinvoicearchived").disabled = false;
            } else {
                document.getElementById("listrecords").checked = false;
                document.getElementById("migrate").checked = false;
                document.getElementById("exportrecords").checked = false;
                document.getElementById("clearrecords").checked = false;
                document.getElementById("accountdetails").checked = false;
                document.getElementById("exportinvoice").checked = false;
                document.getElementById("accountedit").checked = false;
                document.getElementById("statementaccount").checked = false;
                document.getElementById("paymentaccount").checked = false;
                document.getElementById("deleteaccount").checked = false;
                document.getElementById("serviceaccount").checked = false;
                document.getElementById("billingaccount").checked = false;
                document.getElementById("stateaccount").checked = false;
                document.getElementById("clearinvoice").checked = false;
                document.getElementById("deleteinvoice").checked = false;
                document.getElementById("archivedrecords").checked = false;
                document.getElementById("exportarchived").checked = false;
                document.getElementById("cleararchived").checked = false;
                document.getElementById("archiveddetails").checked = false;
                document.getElementById("exportinvoicearchived").checked = false;
                document.getElementById("statementaccountarchived").checked = false;
                document.getElementById("paymentaccountarchived").checked = false;
                document.getElementById("deleteaccountarchived").checked = false;
                document.getElementById("clearinvoicearchived").checked = false;
                document.getElementById("deleteinvoicearchived").checked = false;

                document.getElementById("listrecords").disabled = true;
                document.getElementById("migrate").disabled = true;
                document.getElementById("exportrecords").disabled = true;
                document.getElementById("clearrecords").disabled = true;
                document.getElementById("accountdetails").disabled = true;
                document.getElementById("exportinvoice").disabled = true;
                document.getElementById("accountedit").disabled = true;
                document.getElementById("statementaccount").disabled = true;
                document.getElementById("paymentaccount").disabled = true;
                document.getElementById("deleteaccount").disabled = true;
                document.getElementById("serviceaccount").disabled = true;
                document.getElementById("billingaccount").disabled = true;
                document.getElementById("stateaccount").disabled = true;
                document.getElementById("clearinvoice").disabled = true;
                document.getElementById("deleteinvoice").disabled = true;
                document.getElementById("archivedrecords").disabled = true;
                document.getElementById("exportarchived").disabled = true;
                document.getElementById("cleararchived").disabled = true;
                document.getElementById("archiveddetails").disabled = true;
                document.getElementById("exportinvoicearchived").disabled = true;
                document.getElementById("statementaccountarchived").disabled = true;
                document.getElementById("paymentaccountarchived").disabled = true;
                document.getElementById("deleteaccountarchived").disabled = true;
                document.getElementById("clearinvoicearchived").disabled = true;
                document.getElementById("deleteinvoicearchived").disabled = true;
            }
        }
    </script>
    <script>
        function listrecordsFunction() {
            document.getElementById("listrecords");
            if (document.getElementById("listrecords").checked == true) {
                document.getElementById("migrate").checked = true;
                document.getElementById("exportrecords").checked = true;
                document.getElementById("clearrecords").checked = true;
                document.getElementById("accountdetails").checked = true;
                document.getElementById("exportinvoice").checked = true;
                document.getElementById("accountedit").checked = true;
                document.getElementById("statementaccount").checked = true;
                document.getElementById("paymentaccount").checked = true;
                document.getElementById("deleteaccount").checked = true;
                document.getElementById("serviceaccount").checked = true;
                document.getElementById("billingaccount").checked = true;
                document.getElementById("stateaccount").checked = true;
                document.getElementById("clearinvoice").checked = true;
                document.getElementById("deleteinvoice").checked = true;

                document.getElementById("migrate").disabled = false;
                document.getElementById("exportrecords").disabled = false;
                document.getElementById("clearrecords").disabled = false;
                document.getElementById("accountdetails").disabled = false;
                document.getElementById("exportinvoice").disabled = false;
                document.getElementById("accountedit").disabled = false;
                document.getElementById("statementaccount").disabled = false;
                document.getElementById("paymentaccount").disabled = false;
                document.getElementById("deleteaccount").disabled = false;
                document.getElementById("serviceaccount").disabled = false;
                document.getElementById("billingaccount").disabled = false;
                document.getElementById("stateaccount").disabled = false;
                document.getElementById("clearinvoice").disabled = false;
                document.getElementById("deleteinvoice").disabled = false;
            } else {
                document.getElementById("migrate").checked = false;
                document.getElementById("exportrecords").checked = false;
                document.getElementById("clearrecords").checked = false;
                document.getElementById("accountdetails").checked = false;
                document.getElementById("exportinvoice").checked = false;
                document.getElementById("accountedit").checked = false;
                document.getElementById("statementaccount").checked = false;
                document.getElementById("paymentaccount").checked = false;
                document.getElementById("deleteaccount").checked = false;
                document.getElementById("serviceaccount").checked = false;
                document.getElementById("billingaccount").checked = false;
                document.getElementById("stateaccount").checked = false;
                document.getElementById("clearinvoice").checked = false;
                document.getElementById("deleteinvoice").checked = false;

                document.getElementById("migrate").disabled = true;
                document.getElementById("exportrecords").disabled = true;
                document.getElementById("clearrecords").disabled = true;
                document.getElementById("accountdetails").disabled = true;
                document.getElementById("exportinvoice").disabled = true;
                document.getElementById("accountedit").disabled = true;
                document.getElementById("statementaccount").disabled = true;
                document.getElementById("paymentaccount").disabled = true;
                document.getElementById("deleteaccount").disabled = true;
                document.getElementById("serviceaccount").disabled = true;
                document.getElementById("billingaccount").disabled = true;
                document.getElementById("stateaccount").disabled = true;
                document.getElementById("clearinvoice").disabled = true;
                document.getElementById("deleteinvoice").disabled = true;
            }
        }
    </script>
    <script>
        function listarchivedFunction() {
            document.getElementById("archivedrecords");
            if (document.getElementById("archivedrecords").checked == true) {
                document.getElementById("exportarchived").checked = true;
                document.getElementById("cleararchived").checked = true;
                document.getElementById("archiveddetails").checked = true;
                document.getElementById("exportinvoicearchived").checked = true;
                document.getElementById("statementaccountarchived").checked = true;
                document.getElementById("paymentaccountarchived").checked = true;
                document.getElementById("deleteaccountarchived").checked = true;
                document.getElementById("clearinvoicearchived").checked = true;
                document.getElementById("deleteinvoicearchived").checked = true;

                document.getElementById("exportarchived").disabled = false;
                document.getElementById("cleararchived").disabled = false;
                document.getElementById("archiveddetails").disabled = false;
                document.getElementById("exportinvoicearchived").disabled = false;
                document.getElementById("statementaccountarchived").disabled = false;
                document.getElementById("paymentaccountarchived").disabled = false;
                document.getElementById("deleteaccountarchived").disabled = false;
                document.getElementById("clearinvoicearchived").disabled = false;
                document.getElementById("deleteinvoicearchived").disabled = false;
            } else {
                document.getElementById("exportarchived").checked = false;
                document.getElementById("cleararchived").checked = false;
                document.getElementById("archiveddetails").checked = false;
                document.getElementById("exportinvoicearchived").checked = false;
                document.getElementById("statementaccountarchived").checked = false;
                document.getElementById("paymentaccountarchived").checked = false;
                document.getElementById("deleteaccountarchived").checked = false;
                document.getElementById("clearinvoicearchived").checked = false;
                document.getElementById("deleteinvoicearchived").checked = false;

                document.getElementById("exportarchived").disabled = true;
                document.getElementById("cleararchived").disabled = true;
                document.getElementById("archiveddetails").disabled = true;
                document.getElementById("exportinvoicearchived").disabled = true;
                document.getElementById("statementaccountarchived").disabled = true;
                document.getElementById("paymentaccountarchived").disabled = true;
                document.getElementById("deleteaccountarchived").disabled = true;
                document.getElementById("clearinvoicearchived").disabled = true;
                document.getElementById("deleteinvoicearchived").disabled = true;
            }
        }
    </script>
    <script>
        function productsFunction() {
            document.getElementById("products");
            if (document.getElementById("products").checked == true) {
                document.getElementById("addproducts").checked = true;
                document.getElementById("editproducts").checked = true;
                document.getElementById("deleteproducts").checked = true;
                document.getElementById("clearproducts").checked = true;

                document.getElementById("addproducts").disabled = false;
                document.getElementById("editproducts").disabled = false;
                document.getElementById("deleteproducts").disabled = false;
                document.getElementById("clearproducts").disabled = false;
            } else {
                document.getElementById("addproducts").checked = false;
                document.getElementById("editproducts").checked = false;
                document.getElementById("deleteproducts").checked = false;
                document.getElementById("clearproducts").checked = false;

                document.getElementById("addproducts").disabled = true;
                document.getElementById("editproducts").disabled = true;
                document.getElementById("deleteproducts").disabled = true;
                document.getElementById("clearproducts").disabled = true;
            }
        }
    </script>
    <script>
        function policyFunction() {
            document.getElementById("policy");
            if (document.getElementById("policy").checked == true) {
                document.getElementById("addpolicy").checked = true;
                document.getElementById("editpolicy").checked = true;
                document.getElementById("deletepolicy").checked = true;

                document.getElementById("addpolicy").disabled = false;
                document.getElementById("editpolicy").disabled = false;
                document.getElementById("deletepolicy").disabled = false;
            } else {
                document.getElementById("addpolicy").checked = false;
                document.getElementById("editpolicy").checked = false;
                document.getElementById("deletepolicy").checked = false;

                document.getElementById("addpolicy").disabled = true;
                document.getElementById("editpolicy").disabled = true;
                document.getElementById("deletepolicy").disabled = true;
            }
        }
    </script>
    <script>
        function hotspotFunction() {
            document.getElementById("hotspot");
            if (document.getElementById("hotspot").checked == true) {
                document.getElementById("vouchers").checked = true;
                document.getElementById("addsinglevoucher").checked = true;
                document.getElementById("addbatchvoucher").checked = true;
                document.getElementById("deleteallvoucher").checked = true;
                document.getElementById("exportvouchers").checked = true;
                document.getElementById("resend").checked = true;
                document.getElementById("deletesinglevoucher").checked = true;
                document.getElementById("clearvoucher").checked = true;
                document.getElementById("pisorates").checked = true;
                document.getElementById("addrates").checked = true;
                document.getElementById("clearrates").checked = true;
                document.getElementById("editrates").checked = true;
                document.getElementById("deleterates").checked = true;

                document.getElementById("vouchers").disabled = false;
                document.getElementById("addsinglevoucher").disabled = false;
                document.getElementById("addbatchvoucher").disabled = false;
                document.getElementById("deleteallvoucher").disabled = false;
                document.getElementById("exportvouchers").disabled = false;
                document.getElementById("resend").disabled = false;
                document.getElementById("deletesinglevoucher").disabled = false;
                document.getElementById("clearvoucher").disabled = false;
                document.getElementById("pisorates").disabled = false;
                document.getElementById("addrates").disabled = false;
                document.getElementById("clearrates").disabled = false;
                document.getElementById("editrates").disabled = false;
                document.getElementById("deleterates").disabled = false;
            } else {
                document.getElementById("vouchers").checked = false;
                document.getElementById("addsinglevoucher").checked = false;
                document.getElementById("addbatchvoucher").checked = false;
                document.getElementById("deleteallvoucher").checked = false;
                document.getElementById("exportvouchers").checked = false;
                document.getElementById("resend").checked = false;
                document.getElementById("deletesinglevoucher").checked = false;
                document.getElementById("clearvoucher").checked = false;
                document.getElementById("pisorates").checked = false;
                document.getElementById("addrates").checked = false;
                document.getElementById("clearrates").checked = false;
                document.getElementById("editrates").checked = false;
                document.getElementById("deleterates").checked = false;

                document.getElementById("vouchers").disabled = true;
                document.getElementById("addsinglevoucher").disabled = true;
                document.getElementById("addbatchvoucher").disabled = true;
                document.getElementById("deleteallvoucher").disabled = true;
                document.getElementById("exportvouchers").disabled = true;
                document.getElementById("resend").disabled = true;
                document.getElementById("deletesinglevoucher").disabled = true;
                document.getElementById("clearvoucher").disabled = true;
                document.getElementById("pisorates").disabled = true;
                document.getElementById("addrates").disabled = true;
                document.getElementById("clearrates").disabled = true;
                document.getElementById("editrates").disabled = true;
                document.getElementById("deleterates").disabled = true;
            }
        }
    </script>
    <script>
        function vouchersFunction() {
            document.getElementById("vouchers");
            if (document.getElementById("vouchers").checked == true) {
                document.getElementById("addsinglevoucher").checked = true;
                document.getElementById("addbatchvoucher").checked = true;
                document.getElementById("deleteallvoucher").checked = true;
                document.getElementById("exportvouchers").checked = true;
                document.getElementById("resend").checked = true;
                document.getElementById("deletesinglevoucher").checked = true;
                document.getElementById("clearvoucher").checked = true;

                document.getElementById("addsinglevoucher").disabled = false;
                document.getElementById("addbatchvoucher").disabled = false;
                document.getElementById("deleteallvoucher").disabled = false;
                document.getElementById("exportvouchers").disabled = false;
                document.getElementById("resend").disabled = false;
                document.getElementById("deletesinglevoucher").disabled = false;
                document.getElementById("clearvoucher").disabled = false;
            } else {
                document.getElementById("addsinglevoucher").checked = false;
                document.getElementById("addbatchvoucher").checked = false;
                document.getElementById("deleteallvoucher").checked = false;
                document.getElementById("exportvouchers").checked = false;
                document.getElementById("resend").checked = false;
                document.getElementById("deletesinglevoucher").checked = false;
                document.getElementById("clearvoucher").checked = false;

                document.getElementById("addsinglevoucher").disabled = true;
                document.getElementById("addbatchvoucher").disabled = true;
                document.getElementById("deleteallvoucher").disabled = true;
                document.getElementById("exportvouchers").disabled = true;
                document.getElementById("resend").disabled = true;
                document.getElementById("deletesinglevoucher").disabled = true;
                document.getElementById("clearvoucher").disabled = true;
            }
        }
    </script>
    <script>
        function pisoratesFunction() {
            document.getElementById("pisorates");
            if (document.getElementById("pisorates").checked == true) {
                document.getElementById("addrates").checked = true;
                document.getElementById("clearrates").checked = true;
                document.getElementById("editrates").checked = true;
                document.getElementById("deleterates").checked = true;

                document.getElementById("addrates").disabled = false;
                document.getElementById("clearrates").disabled = false;
                document.getElementById("editrates").disabled = false;
                document.getElementById("deleterates").disabled = false;
            } else {
                document.getElementById("addrates").checked = false;
                document.getElementById("clearrates").checked = false;
                document.getElementById("editrates").checked = false;
                document.getElementById("deleterates").checked = false;

                document.getElementById("addrates").disabled = true;
                document.getElementById("clearrates").disabled = true;
                document.getElementById("editrates").disabled = true;
                document.getElementById("deleterates").disabled = true;
            }
        }
    </script>
    <script>
        function transactionsFunction() {
            document.getElementById("transactions");
            if (document.getElementById("transactions").checked == true) {
                document.getElementById("history").checked = true;
                document.getElementById("exportpayments").checked = true;
                document.getElementById("clearpayments").checked = true;
                document.getElementById("deletepayments").checked = true;
                document.getElementById("exportcharges").checked = true;
                document.getElementById("clearcharges").checked = true;
                document.getElementById("deletecharges").checked = true;
                document.getElementById("expenses").checked = true;
                document.getElementById("exportexpenses").checked = true;
                document.getElementById("addexpenses").checked = true;
                document.getElementById("clearexpenses").checked = true;
                document.getElementById("editexpenses").checked = true;
                document.getElementById("deleteexpenses").checked = true;

                document.getElementById("history").disabled = false;
                document.getElementById("exportpayments").disabled = false;
                document.getElementById("clearpayments").disabled = false;
                document.getElementById("deletepayments").disabled = false;
                document.getElementById("exportcharges").disabled = false;
                document.getElementById("clearcharges").disabled = false;
                document.getElementById("deletecharges").disabled = false;
                document.getElementById("expenses").disabled = false;
                document.getElementById("exportexpenses").disabled = false;
                document.getElementById("addexpenses").disabled = false;
                document.getElementById("clearexpenses").disabled = false;
                document.getElementById("editexpenses").disabled = false;
                document.getElementById("deleteexpenses").disabled = false;
            } else {
                document.getElementById("history").checked = false;
                document.getElementById("exportpayments").checked = false;
                document.getElementById("clearpayments").checked = false;
                document.getElementById("deletepayments").checked = false;
                document.getElementById("exportcharges").checked = false;
                document.getElementById("clearcharges").checked = false;
                document.getElementById("deletecharges").checked = false;
                document.getElementById("expenses").checked = false;
                document.getElementById("exportexpenses").checked = false;
                document.getElementById("addexpenses").checked = false;
                document.getElementById("clearexpenses").checked = false;
                document.getElementById("editexpenses").checked = false;
                document.getElementById("deleteexpenses").checked = false;

                document.getElementById("history").disabled = true;
                document.getElementById("exportpayments").disabled = true;
                document.getElementById("clearpayments").disabled = true;
                document.getElementById("deletepayments").disabled = true;
                document.getElementById("exportcharges").disabled = true;
                document.getElementById("clearcharges").disabled = true;
                document.getElementById("deletecharges").disabled = true;
                document.getElementById("expenses").disabled = true;
                document.getElementById("exportexpenses").disabled = true;
                document.getElementById("addexpenses").disabled = true;
                document.getElementById("clearexpenses").disabled = true;
                document.getElementById("editexpenses").disabled = true;
                document.getElementById("deleteexpenses").disabled = true;
            }
        }
    </script>
    <script>
        function historyFunction() {
            document.getElementById("history");
            if (document.getElementById("history").checked == true) {
                document.getElementById("exportpayments").checked = true;
                document.getElementById("clearpayments").checked = true;
                document.getElementById("deletepayments").checked = true;
                document.getElementById("exportcharges").checked = true;
                document.getElementById("clearcharges").checked = true;
                document.getElementById("deletecharges").checked = true;

                document.getElementById("exportpayments").disabled = false;
                document.getElementById("clearpayments").disabled = false;
                document.getElementById("deletepayments").disabled = false;
                document.getElementById("exportcharges").disabled = false;
                document.getElementById("clearcharges").disabled = false;
                document.getElementById("deletecharges").disabled = false;
            } else {
                document.getElementById("exportpayments").checked = false;
                document.getElementById("clearpayments").checked = false;
                document.getElementById("deletepayments").checked = false;
                document.getElementById("exportcharges").checked = false;
                document.getElementById("clearcharges").checked = false;
                document.getElementById("deletecharges").checked = false;

                document.getElementById("exportpayments").disabled = true;
                document.getElementById("clearpayments").disabled = true;
                document.getElementById("deletepayments").disabled = true;
                document.getElementById("exportcharges").disabled = true;
                document.getElementById("clearcharges").disabled = true;
                document.getElementById("deletecharges").disabled = true;
            }
        }
    </script>
    <script>
        function expensesFunction() {
            document.getElementById("expenses");
            if (document.getElementById("expenses").checked == true) {
                document.getElementById("exportexpenses").checked = true;
                document.getElementById("addexpenses").checked = true;
                document.getElementById("clearexpenses").checked = true;
                document.getElementById("editexpenses").checked = true;
                document.getElementById("deleteexpenses").checked = true;

                document.getElementById("exportexpenses").disabled = false;
                document.getElementById("addexpenses").disabled = false;
                document.getElementById("clearexpenses").disabled = false;
                document.getElementById("editexpenses").disabled = false;
                document.getElementById("deleteexpenses").disabled = false;
            } else {
                document.getElementById("exportexpenses").checked = false;
                document.getElementById("addexpenses").checked = false;
                document.getElementById("clearexpenses").checked = false;
                document.getElementById("editexpenses").checked = false;
                document.getElementById("deleteexpenses").checked = false;

                document.getElementById("exportexpenses").disabled = true;
                document.getElementById("addexpenses").disabled = true;
                document.getElementById("clearexpenses").disabled = true;
                document.getElementById("editexpenses").disabled = true;
                document.getElementById("deleteexpenses").disabled = true;
            }
        }
    </script>
    <script>
        function supportticketsFunction() {
            document.getElementById("supporttickets");
            if (document.getElementById("supporttickets").checked == true) {
                document.getElementById("exporttickets").checked = true;
                document.getElementById("addticket").checked = true;
                document.getElementById("cleartickets").checked = true;
                document.getElementById("ticketdetails").checked = true;
                document.getElementById("deleteticket").checked = true;

                document.getElementById("exporttickets").disabled = false;
                document.getElementById("addticket").disabled = false;
                document.getElementById("cleartickets").disabled = false;
                document.getElementById("ticketdetails").disabled = false;
                document.getElementById("deleteticket").disabled = false;
            } else {
                document.getElementById("exporttickets").checked = false;
                document.getElementById("addticket").checked = false;
                document.getElementById("cleartickets").checked = false;
                document.getElementById("ticketdetails").checked = false;
                document.getElementById("deleteticket").checked = false;

                document.getElementById("exporttickets").disabled = true;
                document.getElementById("addticket").disabled = true;
                document.getElementById("cleartickets").disabled = true;
                document.getElementById("ticketdetails").disabled = true;
                document.getElementById("deleteticket").disabled = true;
            }
        }
    </script>
    <script>
        function ponmanagementFunction() {
            document.getElementById("ponmanagement");
            if (document.getElementById("ponmanagement").checked == true) {
                document.getElementById("addolt").checked = true;
                document.getElementById("editolt").checked = true;
                document.getElementById("deleteolt").checked = true;
                document.getElementById("clearolt").checked = true;
                document.getElementById("oltdetails").checked = true;
                document.getElementById("addnap").checked = true;
                document.getElementById("editnap").checked = true;
                document.getElementById("deletenap").checked = true;
                document.getElementById("napdetails").checked = true;

                document.getElementById("addolt").disabled = false;
                document.getElementById("editolt").disabled = false;
                document.getElementById("deleteolt").disabled = false;
                document.getElementById("clearolt").disabled = false;
                document.getElementById("oltdetails").disabled = false;
                document.getElementById("addnap").disabled = false;
                document.getElementById("editnap").disabled = false;
                document.getElementById("deletenap").disabled = false;
                document.getElementById("napdetails").disabled = false;
            } else {
                document.getElementById("addolt").checked = false;
                document.getElementById("editolt").checked = false;
                document.getElementById("deleteolt").checked = false;
                document.getElementById("clearolt").checked = false;
                document.getElementById("oltdetails").checked = false;
                document.getElementById("addnap").checked = false;
                document.getElementById("editnap").checked = false;
                document.getElementById("deletenap").checked = false;
                document.getElementById("napdetails").checked = false;

                document.getElementById("addolt").disabled = true;
                document.getElementById("editolt").disabled = true;
                document.getElementById("deleteolt").disabled = true;
                document.getElementById("clearolt").disabled = true;
                document.getElementById("oltdetails").disabled = true;
                document.getElementById("addnap").disabled = true;
                document.getElementById("editnap").disabled = true;
                document.getElementById("deletenap").disabled = true;
                document.getElementById("napdetails").disabled = true;
            }
        }
    </script>
    <script>
        function apiintegrationFunction() {
            document.getElementById("apiintegration");
            if (document.getElementById("apiintegration").checked == true) {
                document.getElementById("messaging").checked = true;
                document.getElementById("createmessage").checked = true;
                document.getElementById("clearoutbox").checked = true;
                document.getElementById("resendoutbox").checked = true;
                document.getElementById("deleteoutbox").checked = true;
                document.getElementById("scheduler").checked = true;
                document.getElementById("addscheduler").checked = true;
                document.getElementById("clearscheduler").checked = true;
                document.getElementById("editscheduler").checked = true;
                document.getElementById("deletescheduler").checked = true;
                document.getElementById("apisettings").checked = true;

                document.getElementById("messaging").disabled = false;
                document.getElementById("createmessage").disabled = false;
                document.getElementById("clearoutbox").disabled = false;
                document.getElementById("resendoutbox").disabled = false;
                document.getElementById("deleteoutbox").disabled = false;
                document.getElementById("scheduler").disabled = false;
                document.getElementById("addscheduler").disabled = false;
                document.getElementById("clearscheduler").disabled = false;
                document.getElementById("editscheduler").disabled = false;
                document.getElementById("deletescheduler").disabled = false;
                document.getElementById("apisettings").disabled = false;
            } else {
                document.getElementById("messaging").checked = false;
                document.getElementById("createmessage").checked = false;
                document.getElementById("clearoutbox").checked = false;
                document.getElementById("resendoutbox").checked = false;
                document.getElementById("deleteoutbox").checked = false;
                document.getElementById("scheduler").checked = false;
                document.getElementById("addscheduler").checked = false;
                document.getElementById("clearscheduler").checked = false;
                document.getElementById("editscheduler").checked = false;
                document.getElementById("deletescheduler").checked = false;
                document.getElementById("apisettings").checked = false;

                document.getElementById("messaging").disabled = true;
                document.getElementById("createmessage").disabled = true;
                document.getElementById("clearoutbox").disabled = true;
                document.getElementById("resendoutbox").disabled = true;
                document.getElementById("deleteoutbox").disabled = true;
                document.getElementById("scheduler").disabled = true;
                document.getElementById("addscheduler").disabled = true;
                document.getElementById("clearscheduler").disabled = true;
                document.getElementById("editscheduler").disabled = true;
                document.getElementById("deletescheduler").disabled = true;
                document.getElementById("apisettings").disabled = true;
            }
        }
    </script>
    <script>
        function messagingFunction() {
            document.getElementById("messaging");
            if (document.getElementById("messaging").checked == true) {
                document.getElementById("createmessage").checked = true;
                document.getElementById("clearoutbox").checked = true;
                document.getElementById("resendoutbox").checked = true;
                document.getElementById("deleteoutbox").checked = true;

                document.getElementById("createmessage").disabled = false;
                document.getElementById("clearoutbox").disabled = false;
                document.getElementById("resendoutbox").disabled = false;
                document.getElementById("deleteoutbox").disabled = false;
            } else {
                document.getElementById("createmessage").checked = false;
                document.getElementById("clearoutbox").checked = false;
                document.getElementById("resendoutbox").checked = false;
                document.getElementById("deleteoutbox").checked = false;

                document.getElementById("createmessage").disabled = true;
                document.getElementById("clearoutbox").disabled = true;
                document.getElementById("resendoutbox").disabled = true;
                document.getElementById("deleteoutbox").disabled = true;
            }
        }
    </script>
    <script>
        function schedulerFunction() {
            document.getElementById("scheduler");
            if (document.getElementById("scheduler").checked == true) {
                document.getElementById("addscheduler").checked = true;
                document.getElementById("clearscheduler").checked = true;
                document.getElementById("editscheduler").checked = true;
                document.getElementById("deletescheduler").checked = true;

                document.getElementById("addscheduler").disabled = false;
                document.getElementById("clearscheduler").disabled = false;
                document.getElementById("editscheduler").disabled = false;
                document.getElementById("deletescheduler").disabled = false;
            } else {
                document.getElementById("addscheduler").checked = false;
                document.getElementById("clearscheduler").checked = false;
                document.getElementById("editscheduler").checked = false;
                document.getElementById("deletescheduler").checked = false;

                document.getElementById("addscheduler").disabled = true;
                document.getElementById("clearscheduler").disabled = true;
                document.getElementById("editscheduler").disabled = true;
                document.getElementById("deletescheduler").disabled = true;
            }
        }
    </script>
    <script>
        function settingsFunction() {
            document.getElementById("settings");
            if (document.getElementById("settings").checked == true) {
                document.getElementById("mikrotik").checked = true;
                document.getElementById("userprofile").checked = true;
                document.getElementById("adduser").checked = true;
                document.getElementById("userdetails").checked = true;
                document.getElementById("edituser").checked = true;
                document.getElementById("deleteuser").checked = true;
                document.getElementById("addprofile").checked = true;
                document.getElementById("editprofile").checked = true;
                document.getElementById("deleteprofile").checked = true;

                document.getElementById("mikrotik").disabled = false;
                document.getElementById("userprofile").disabled = false;
                document.getElementById("adduser").disabled = false;
                document.getElementById("userdetails").disabled = false;
                document.getElementById("edituser").disabled = false;
                document.getElementById("deleteuser").disabled = false;
                document.getElementById("addprofile").disabled = false;
                document.getElementById("editprofile").disabled = false;
                document.getElementById("deleteprofile").disabled = false;
            } else {
                document.getElementById("mikrotik").checked = false;
                document.getElementById("userprofile").checked = false;
                document.getElementById("adduser").checked = false;
                document.getElementById("userdetails").checked = false;
                document.getElementById("edituser").checked = false;
                document.getElementById("deleteuser").checked = false;
                document.getElementById("addprofile").checked = false;
                document.getElementById("editprofile").checked = false;
                document.getElementById("deleteprofile").checked = false;

                document.getElementById("mikrotik").disabled = true;
                document.getElementById("userprofile").disabled = true;
                document.getElementById("adduser").disabled = true;
                document.getElementById("userdetails").disabled = true;
                document.getElementById("edituser").disabled = true;
                document.getElementById("deleteuser").disabled = true;
                document.getElementById("addprofile").disabled = true;
                document.getElementById("editprofile").disabled = true;
                document.getElementById("deleteprofile").disabled = true;
            }
        }
    </script>
    <script>
        function userprofileFunction() {
            document.getElementById("userprofile");
            if (document.getElementById("userprofile").checked == true) {
                document.getElementById("adduser").checked = true;
                document.getElementById("userdetails").checked = true;
                document.getElementById("edituser").checked = true;
                document.getElementById("deleteuser").checked = true;
                document.getElementById("addprofile").checked = true;
                document.getElementById("editprofile").checked = true;
                document.getElementById("deleteprofile").checked = true;

                document.getElementById("adduser").disabled = false;
                document.getElementById("userdetails").disabled = false;
                document.getElementById("edituser").disabled = false;
                document.getElementById("deleteuser").disabled = false;
                document.getElementById("addprofile").disabled = false;
                document.getElementById("editprofile").disabled = false;
                document.getElementById("deleteprofile").disabled = false;
            } else {
                document.getElementById("adduser").checked = false;
                document.getElementById("userdetails").checked = false;
                document.getElementById("edituser").checked = false;
                document.getElementById("deleteuser").checked = false;
                document.getElementById("addprofile").checked = false;
                document.getElementById("editprofile").checked = false;
                document.getElementById("deleteprofile").checked = false;

                document.getElementById("adduser").disabled = true;
                document.getElementById("userdetails").disabled = true;
                document.getElementById("edituser").disabled = true;
                document.getElementById("deleteuser").disabled = true;
                document.getElementById("addprofile").disabled = true;
                document.getElementById("editprofile").disabled = true;
                document.getElementById("deleteprofile").disabled = true;
            }
        }
    </script>
    <script>
        function logsFunction() {
            document.getElementById("logs");
            if (document.getElementById("logs").checked == true) {
                document.getElementById("systemlogs").checked = true;
                document.getElementById("exportsystemlogs").checked = true;
                document.getElementById("clearsystemlogs").checked = true;
                document.getElementById("activitylogs").checked = true;
                document.getElementById("exportactivitylogs").checked = true;
                document.getElementById("addactivitylogs").checked = true;
                document.getElementById("clearactivitylogs").checked = true;
                document.getElementById("editactivitylogs").checked = true;
                document.getElementById("deleteactivitylogs").checked = true;

                document.getElementById("systemlogs").disabled = false;
                document.getElementById("exportsystemlogs").disabled = false;
                document.getElementById("clearsystemlogs").disabled = false;
                document.getElementById("activitylogs").disabled = false;
                document.getElementById("exportactivitylogs").disabled = false;
                document.getElementById("addactivitylogs").disabled = false;
                document.getElementById("clearactivitylogs").disabled = false;
                document.getElementById("editactivitylogs").disabled = false;
                document.getElementById("deleteactivitylogs").disabled = false;
            } else {
                document.getElementById("systemlogs").checked = false;
                document.getElementById("exportsystemlogs").checked = false;
                document.getElementById("clearsystemlogs").checked = false;
                document.getElementById("activitylogs").checked = false;
                document.getElementById("exportactivitylogs").checked = false;
                document.getElementById("addactivitylogs").checked = false;
                document.getElementById("clearactivitylogs").checked = false;
                document.getElementById("editactivitylogs").checked = false;
                document.getElementById("deleteactivitylogs").checked = false;

                document.getElementById("systemlogs").disabled = true;
                document.getElementById("exportsystemlogs").disabled = true;
                document.getElementById("clearsystemlogs").disabled = true;
                document.getElementById("activitylogs").disabled = true;
                document.getElementById("exportactivitylogs").disabled = true;
                document.getElementById("addactivitylogs").disabled = true;
                document.getElementById("clearactivitylogs").disabled = true;
                document.getElementById("editactivitylogs").disabled = true;
                document.getElementById("deleteactivitylogs").disabled = true;
            }
        }
    </script>
    <script>
        function systemlogsFunction() {
            document.getElementById("systemlogs");
            if (document.getElementById("systemlogs").checked == true) {
                document.getElementById("exportsystemlogs").checked = true;
                document.getElementById("clearsystemlogs").checked = true;

                document.getElementById("exportsystemlogs").disabled = false;
                document.getElementById("clearsystemlogs").disabled = false;
            } else {
                document.getElementById("exportsystemlogs").checked = false;
                document.getElementById("clearsystemlogs").checked = false;

                document.getElementById("exportsystemlogs").disabled = true;
                document.getElementById("clearsystemlogs").disabled = true;
            }
        }
    </script>
    <script>
        function activitylogsFunction() {
            document.getElementById("activitylogs");
            if (document.getElementById("activitylogs").checked == true) {
                document.getElementById("exportactivitylogs").checked = true;
                document.getElementById("addactivitylogs").checked = true;
                document.getElementById("clearactivitylogs").checked = true;
                document.getElementById("editactivitylogs").checked = true;
                document.getElementById("deleteactivitylogs").checked = true;

                document.getElementById("exportactivitylogs").disabled = false;
                document.getElementById("addactivitylogs").disabled = false;
                document.getElementById("clearactivitylogs").disabled = false;
                document.getElementById("editactivitylogs").disabled = false;
                document.getElementById("deleteactivitylogs").disabled = false;
            } else {
                document.getElementById("exportactivitylogs").checked = false;
                document.getElementById("addactivitylogs").checked = false;
                document.getElementById("clearactivitylogs").checked = false;
                document.getElementById("editactivitylogs").checked = false;
                document.getElementById("deleteactivitylogs").checked = false;

                document.getElementById("exportactivitylogs").disabled = true;
                document.getElementById("addactivitylogs").disabled = true;
                document.getElementById("clearactivitylogs").disabled = true;
                document.getElementById("editactivitylogs").disabled = true;
                document.getElementById("deleteactivitylogs").disabled = true;
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</div>
@endsection
