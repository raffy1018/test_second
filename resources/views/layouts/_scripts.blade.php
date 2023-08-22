@stack('scripts_before')

<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/app.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

<!-- Select2 -->
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>

@yield('js_after')

@stack('scripts_after')