@csrf
<h3 class="mt-4">Customer Profile</h3>
<div class="row px-5 mt-4">
    <div class=" col-lg-4 col-md-12 mb-1">
        <div class="form-group" style="width: auto%;">
            <div class="d-flex justify-content-start">Account No.:</div>
            <div class="d-flex justify-content-start">
                <input type="text" style="text-align:center;" class="form-control rounded-pill" name="account_no" id="account_number" readonly="">
            </div>
        </div>
    </div>
    <div class=" col-lg-4 col-md-12 mb-1">
        <div class="form-group" style="width: auto%;">
            <div class="d-flex justify-content-start">First Name:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="first_name" placeholder="Enter First Name" required="">
        </div>
    </div>
    <div class=" col-lg-4 col-md-12 mb-1">
        <div class="form-group" style="width: auto%;">
            <div class="d-flex justify-content-start">Last Name:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="last_name" placeholder="Enter Last Name">
        </div>
    </div>
</div>
<div class="row px-5">
    <div class=" col-lg-9 col-md-12 mb-1">
        <div class="form-group" style="width: auto%;">
            <div class="d-flex justify-content-start">Billing Address:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="address" placeholder="Enter Billing Address">
        </div>
    </div>
    <div class=" col-lg-3 col-md-12 mb-1">
        <div class="form-group" style="width: auto%;">
            <div class="d-flex justify-content-start">Area:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="area" placeholder="Enter Area" >
        </div>
    </div>
</div>
<div class="row px-5 pb-3">
    <div class=" col-lg-4 col-md-12 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">Contact Number:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="contact_no" placeholder="Enter Contact Number" >
        </div>
    </div>
    <div class=" col-lg-4 col-md-12 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">Email Address:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="email" placeholder="Enter Email Address" >
        </div>
    </div>
    <div class=" col-lg-4 col-md-12 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">Coordinates:</div>
            <div class="d-flex justify-content-start">
                <input type="text" style="text-align:center;" class="form-control rounded-pill" name="coordinates" id="coordinates" placeholder="Enter Coordinates" >
            </div>
            <div id="gpsError" class="text-info" style="font-size:0.8rem;"></div>
        </div>
    </div>
</div>
<div class="row px-5 mb-2">
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="d-flex justify-content-start">Gender:</div>
        <div class="d-flex justify-content-center">
            <div class="form-check mx-2 mt-2">
                <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" checked="">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check mx-2 mt-2">
                <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Female
                </label>
            </div>
        </div>
    </div>
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">Birthday:</div>
            <input type="date" style="text-align:center;" class="form-control rounded-pill" name="birth_date" placeholder="Enter Birthday">
        </div>
    </div>
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">Installation Date:</div>
            <input type="date" style="text-align:center;" class="form-control rounded-pill" name="installation_date" placeholder="Enter Installation Date">
        </div>
    </div>
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">Remarks:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="notes" placeholder="Enter Remarks">
        </div>
    </div>
</div>

<div class="border-bottom w-100"></div>

<h3 class="mt-4">Advance Profile</h3>
<div class="row px-5 mt-4">
    <div class=" col-lg-3 col-md-12 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">OLT Device:</div>
            <select id="olt-device" class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="olt_device">
                <option selected disabled>-- Select one --</option>
                @foreach(\App\Models\OltDevice::all() as $olt)
                    <option value="{{ $olt->id }}">{{ $olt->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class=" col-lg-3 col-md-12 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">PON Port:</div>
            <select id="pon-port" class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="pon_port">

            </select>
        </div>
    </div>
    <div class=" col-lg-3 col-md-12 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">NAP Device:</div>
            <select id="nap-device" class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="nap_device">

            </select>
        </div>
    </div>
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">NAP Port:</div>
            <select id="nap-port" class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="nap_port">

            </select>
        </div>
    </div>
</div>
<div class="row px-5 mt-4 mb-3">
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">ONU Name:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="onu_name" placeholder="Enter ONU Name" >
        </div>
    </div>
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">MAC Address:</div>
            <input id="mac" type="text" style="text-align:center;" class="form-control rounded-pill" name="mac_address" placeholder="XX:XX:XX:XX:XX:XX" >
        </div>
    </div>
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">Remarks 1:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="remarks_1" placeholder="Enter Remarks" >
        </div>
    </div>
    <div class=" col-lg-3 col-md-6 mb-1">
        <div class="form-group" style="width: auto;">
            <div class="d-flex justify-content-start">Remarks 2:</div>
            <input type="text" style="text-align:center;" class="form-control rounded-pill" name="remarks_2" placeholder="Enter Remarks" >
        </div>
    </div>
</div>

@section('js_after')
    <script src="{{ asset('js/plugins/axios/axios.min.js') }}"></script>

    <script type="text/javascript">
        // OLT DEVICE
        $(document).on('change', '[name="olt_device"]', function(event) {
            olt = $(this).val();
            console.log(olt);
            fetchPonPorts()
        });

        function fetchPonPorts() {
            axios.post('{{ route("api.subscriptions.olt-device") }}', {
                '_token': '{{ csrf_token() }}',
                'olt': olt
            }).then(function(res) {
                $('#pon-port').empty();
                $('#nap-device').empty();
                $('#nap-port').empty();

                $('#pon-port').append('<option value="" disabled selected>-- Select one --</option>');

                $.each(res.data, function(key, value) {
                    $('#pon-port').append('<option value="' + value.value + '">' + value.label + '</option>');
                });
            });
        }

        // PON PORTS
        $(document).on('change', '[name="pon_port"]', function(event) {
            pon = $(this).val();
            fetchNapDevices()
        });

        function fetchNapDevices() {
            axios.post('{{ route("api.subscriptions.pon-port") }}', {
                '_token': '{{ csrf_token() }}',
                'pon': pon
            }).then(function(res) {
                $('#nap-device').empty();
                $('#nap-port').empty();

                $('#nap-device').append('<option value="" disabled selected>-- Select one --</option>');

                $.each(res.data, function(key, value) {
                    $('#nap-device').append('<option value="' + value.value + '">' + value.label + '</option>');
                });
            });
        }

        // NAP DEVICES
        $(document).on('change', '[name="nap_device"]', function(event) {
            nap = $(this).val();
            fetchNapPorts()
        });

        function fetchNapPorts() {
            axios.post('{{ route("api.subscriptions.nap-device") }}', {
                '_token': '{{ csrf_token() }}',
                'nap': nap
            }).then(function(res) {
                $('#nap-port').empty();

                $('#nap-port').append('<option value="" disabled selected>-- Select one --</option>');

                $.each(res.data, function(key, value) {
                    $('#nap-port').append('<option value="' + value.value + '">' + value.label + '</option>');
                });
            });
        }
    </script>

<!-- <script>
        function getRandom() {
            var random = Math.floor(Math.random() * 899999 + 100000);
            document.getElementById("account_number").value = random;
        }
    </script>
    <!-- generate account number using today's date plus random number -->
    <script> function getAccNum() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yy = (today.getFullYear()+'').slice(-2);
            today = mm + dd + yy;

            var random = Math.floor(Math.random() * 8999 + 1000);
            var accNumber = today + random;
            document.getElementById("account_number").value = accNumber;
        }</script>

    <!-- Get current location coordinates in long,lat -->
    <script>
        var x = document.getElementById("gpsError");
        var y = document.getElementById("gpsLocation");

        function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            y.value = position.coords.latitude + "," + position.coords.longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script> -->

    <script>
        function getRandom() {
            var random = Math.floor(Math.random() * 899999 + 100000);
            document.getElementById("account_number").value = random;
        }
    </script>
    <script>
        var currentLatitude;
        var currentLongitude;

        var x = document.getElementById("gpsError");
        var y = document.getElementById("coordinates");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getCoordinates);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        console.log(navigator.geolocation, navigator,navigator.geolocation.getCurrentPosition(getCoordinates));
        console.log('location:  '+getLocation());

        function getCoordinates(position) {
            currentLatitude = position.coords.latitude;
            currentLongitude = position.coords.longitude;
            console.log(currentLatitude, currentLongitude);
            y.value = currentLatitude + "," + currentLongitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script>
    <script>
        getAccNum();

        function getAccNum() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yy = (today.getFullYear()+'').slice(-2);
            today = mm + dd + yy;

            var random = Math.floor(Math.random() * 8999 + 1000);
            var accNumber = today + random;
            document.getElementById("account_number").value = accNumber;
        }
    </script>
    

    <script>
        function oltSelect() {
            var olt = document.getElementById("olt").value;
            document.getElementById("nport").innerHTML = '<option value="" selected>Select NAP Port</option>';

            document.getElementById("nap").innerHTML = '<option value="" selected>Select NAP Device</option>';
            document.getElementById("pon").innerHTML = '<option value="" selected>Select PON Port</option><option value="1" class="huawei" style="display:none;">1</option><option value="2" class="huawei" style="display:none;">2</option><option value="3" class="huawei" style="display:none;">3</option><option value="4" class="huawei" style="display:none;">4</option><option value="5" class="huawei" style="display:none;">5</option><option value="6" class="huawei" style="display:none;">6</option><option value="7" class="huawei" style="display:none;">7</option><option value="8" class="huawei" style="display:none;">8</option><option value="9" class="huawei" style="display:none;">9</option><option value="10" class="huawei" style="display:none;">10</option><option value="11" class="huawei" style="display:none;">11</option><option value="12" class="huawei" style="display:none;">12</option><option value="13" class="huawei" style="display:none;">13</option><option value="14" class="huawei" style="display:none;">14</option><option value="15" class="huawei" style="display:none;">15</option><option value="16" class="huawei" style="display:none;">16</option>';
            var x = document.getElementsByClassName(olt);
            var i;
            for (i = 0; i < x.length; i++) {
                x[i].style.display = 'block';
            }
        }
    </script>

    <script>
        function ponSelect() {
            var olt = document.getElementById('olt').value;
            var pon = document.getElementById('pon').value;
            document.getElementById("nport").innerHTML = '<option value="" selected>Select NAP Port</option>';

            document.getElementById("nap").innerHTML = '<option value="" selected>Select NAP Device</option><option value="QCY01-LC01" class="huawei1" style="display:none;">QCY01-LC01</option><option value="QCY01-LC01" class="huawei1" style="display:none;">QCY01-LC01</option><option value="QCY01-LC01" class="huawei1" style="display:none;">QCY01-LC01</option>';
            var x = document.getElementsByClassName(olt + pon);
            var i;
            for (i = 0; i < x.length; i++) {
                x[i].style.display = 'block';
            }
        }
    </script>

    <div hidden="" class="form-group" style="width: auto;">
        <div class="d-flex justify-content-start">Total Ports:</div>
        <select id="nports" class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="nports">
            <option value="" selected="">None</option>

        </select>
    </div>

    <script>
        function napSelect() {
            var olt = document.getElementById('olt').value;
            var pon = document.getElementById('pon').value;
            var nap = document.getElementById('nap').value;
            document.getElementById("nport").innerHTML = '<option value="" selected>Select NAP Port</option>';

            document.getElementById("nports").innerHTML = '<option value="" selected>None</option><option value="8" class="huawei1QCY01-LC01" style="display:none;">8</option><option value="8" class="huawei1QCY01-LC01" style="display:none;">8</option><option value="8" class="huawei1QCY01-LC01" style="display:none;">8</option>';
            var x = document.getElementsByClassName(olt + pon + nap);
            var i;
            for (i = 0; i < x.length; i++) {
                x[i].style.display = 'block';
                x[i].selected = 'true';
            }
            var totalPorts = parseInt(document.getElementById('nports').value);
            for (var i = 1; i < (totalPorts + 1); i++) {
                var y = document.getElementsByClassName(olt + pon + nap + i);
                if(y.length===0){
                    client = "";
                }
                else{
                    client = y[0].innerHTML;
                }
                document.getElementById("nport").innerHTML += '<option value="' + i + '">' + i +' - '+ client +'</option>';
            }
        }
    </script>

    <script>
        document.getElementById("mac").addEventListener('keyup', function() {
            this.value =
                (this.value.toUpperCase()
                    .replace(/[^\d|A-F]/g, '')
                    .match(/.{1,2}/g) || [])
                    .join(":")
        });
    </script>


@endsection