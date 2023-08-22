<!DOCTYPE html>
<html lang="en">

{{-- Include Head --}}
@include('common.head')

<body id="page-top">
<!--
<div id="loader-wrapper">
<div id="loader">
    <img src="{{asset('admin/img/loading.gif')}}" alt="">
    <h2>Loading...</h2>
</div>
</div>
-->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('common.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('common.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('common.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('common.logout-modal')

    @include('layouts._scripts')
</body>

</html>
