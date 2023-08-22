@if(!$subscription)
<div class="modal fade" id="add-subscription-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Account Settings</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.subscriptions.subscriptions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Service:</div>
                        <div class="d-flex justify-content-center">
                            <div class="form-check mx-3 mt-2">
                                <input class="form-check-input" type="radio" name="service" value="PPPoE" id="flexRadioDefault11" onclick="show11();" checked="">
                                <label class="form-check-label" for="flexRadioDefault11">
                                    PPPoE
                                </label>
                            </div>
                            <div class="form-check mx-3 mt-2">
                                <input class="form-check-input" type="radio" name="service" value="Hotspot" id="flexRadioDefault21" onclick="show21();">
                                <label class="form-check-label" for="flexRadioDefault21">
                                    Hotspot
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Username:</div>
                        <div class="d-flex justify-content-start">
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="username" id="secret" placeholder="Enter Username" autocomplete="off" value="wkfqyk7fi1">
                            <i class="fas fa-plus-square" style="margin-left:-30px;margin-top:11px;z-index:2;" onclick="getRandomSecret()"></i>
                        </div>
                        <div class="text-info" style="font-size:0.8rem;">Account Username</div>

                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Password:</div>
                        <div class="d-flex justify-content-start">
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="password" id="secretpass" placeholder="Enter Password" autocomplete="off" value="sel36ptihj">
                            <i class="fas fa-plus-square" style="margin-left:-30px;margin-top:11px;z-index:2;" onclick="getRandomSecretPass()"></i>
                        </div>
                        <div class="text-info" style="font-size:0.8rem;">Account Password</div>
                    </div>

                    <div id="pppoe-address">
                        <div class="form-group" style="width: 70%;display: block;" id="local1">
                            <div class="d-flex justify-content-start">Local Address:</div>
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="local_ip_address" placeholder="Enter Local IP Address" autocomplete="off" value="">
                            <div class="text-info" style="font-size:0.8rem;">Optional: Concentrator IP Address</div>
                        </div>
                        <div class="form-group" style="width: 70%;display: block;" id="remote1">
                            <div class="d-flex justify-content-start">Remote Address:</div>
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="remote_ip_address" placeholder="Enter Remote IP Address" autocomplete="off" value="">
                            <div class="text-info" style="font-size:0.8rem;">Optional: Client Static IP Address</div>
                        </div>
                    </div>

                    <div id="hotspot-address">
                        <div class="form-group" style="width: 70%;" id="haddress1">
                            <div class="d-flex justify-content-start">Address:</div>
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="ip_address" placeholder="Enter IP Address" autocomplete="off" value="">
                            <div class="text-info" style="font-size:0.8rem;">Optional: Client Static IP Address</div>
                        </div>
                    </div>
                    <div class="form-group" style="width: 70%;display: block;">
                        <div class="d-flex justify-content-start">Subscription:</div>
                        <select class="btn btn-white border form-control" style="text-align:left;width:100%;" name="product_id">
                            <option value="" selected="" disabled>--Select one--</option>
                            @foreach(\App\Models\Product::getSelectOptions() as $product)
                                <option value="{{ $product['value'] }}">{{ $product['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Credit Limit:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="credit_limit" placeholder="Enter Credit Limit" autocomplete="off" value="0">
                        <div class="text-info" style="font-size:0.8rem;">Policy Checking: Amount in Php (Optional)</div>
                    </div>
                    <div class="form-group" style="width: 70%;" id="pppoe-profile">
                        <div class="d-flex justify-content-start">Profile:</div>
                        <select class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="profile_pppoe">
                            <option value="" selected="" disabled>--Select one--</option>
                            @foreach(\App\Models\Router::getSubscriptionProfileSelectOptions() as $pppprofile)
                                <option value="{{ $pppprofile['value'] }}">{{ $pppprofile['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 70%;" id="hotspot-profile">
                        <div class="d-flex justify-content-start">Profile:</div>
                        <select class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="profile_hotspot">
                            <option value="" selected="" disabled>--Select one--</option>
                            <option value="default">default</option>
                        </select>
                    </div>
                </center>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="modal fade" id="add-subscription-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Account Settings</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.subscriptions.subscriptions.update', $subscription) }}" method="POST">
                @csrf
                @method('patch')
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Service:</div>
                        <div class="d-flex justify-content-center">
                            <div class="form-check mx-3 mt-2">
                                <input class="form-check-input" type="radio" name="service" value="PPPoE" id="flexRadioDefault11" {{ $subscription->service == 'PPPoE' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexRadioDefault11">
                                    PPPoE
                                </label>
                            </div>
                            <div class="form-check mx-3 mt-2">
                                <input class="form-check-input" type="radio" name="service" value="Hotspot" id="flexRadioDefault21" {{ $subscription->service == 'Hotspot' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexRadioDefault21">
                                    Hotspot
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Username:</div>
                        <div class="d-flex justify-content-start">
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="username" id="secret" placeholder="Enter Username" autocomplete="off" value="{{ $subscription->username }}">
                            <i class="fas fa-plus-square" style="margin-left:-30px;margin-top:11px;z-index:2;" onclick="getRandomSecret()"></i>
                        </div>
                        <div class="text-info" style="font-size:0.8rem;">Account Username</div>

                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Password:</div>
                        <div class="d-flex justify-content-start">
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="password" id="secretpass" placeholder="Enter Password" autocomplete="off" value="{{ $subscription->password }}">
                            <i class="fas fa-plus-square" style="margin-left:-30px;margin-top:11px;z-index:2;" onclick="getRandomSecretPass()"></i>
                        </div>
                        <div class="text-info" style="font-size:0.8rem;">Account Password</div>
                    </div>

                    <div id="pppoe-address">
                        <div class="form-group" style="width: 70%;display: block;" id="local1">
                            <div class="d-flex justify-content-start">Local Address:</div>
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="local_ip_address" placeholder="Enter Local IP Address" autocomplete="off" value="{{ $subscription->local_ip_address }}">
                            <div class="text-info" style="font-size:0.8rem;">Optional: Concentrator IP Address</div>
                        </div>
                        <div class="form-group" style="width: 70%;display: block;" id="remote1">
                            <div class="d-flex justify-content-start">Remote Address:</div>
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="remote_ip_address" placeholder="Enter Remote IP Address" autocomplete="off" value="{{ $subscription->remote_ip_address }}">
                            <div class="text-info" style="font-size:0.8rem;">Optional: Client Static IP Address</div>
                        </div>
                    </div>

                    <div id="hotspot-address">
                        <div class="form-group" style="width: 70%;" id="haddress1">
                            <div class="d-flex justify-content-start">Address:</div>
                            <input type="text" style="text-align: center;" class="form-control rounded-pill" name="ip_address" placeholder="Enter IP Address" autocomplete="off" value="{{ $subscription->ip_address }}">
                            <div class="text-info" style="font-size:0.8rem;">Optional: Client Static IP Address</div>
                        </div>
                    </div>
                    <div class="form-group" style="width: 70%;display: block;">
                        <div class="d-flex justify-content-start">Subscription:</div>
                        <select class="btn btn-white border form-control" style="text-align:left;width:100%;" name="product_id">
                            <option value="" selected="" disabled>--Select one--</option>
                            @foreach(\App\Models\Product::getSelectOptions() as $product)
                                @if($product['value'] == $subscription->product_id)
                                    <option value="{{ $product['value'] }}" selected="">{{ $product['label'] }}</option>
                                @else
                                    <option value="{{ $product['value'] }}">{{ $product['label'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Credit Limit:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="credit_limit" placeholder="Enter Credit Limit" autocomplete="off" value="{{ $subscription->credit_limit }}">
                        <div class="text-info" style="font-size:0.8rem;">Policy Checking: Amount in Php (Optional)</div>
                    </div>
                    <div class="form-group" style="width: 70%;" id="pppoe-profile">
                        <div class="d-flex justify-content-start">Profile:</div>
                        <select class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="profile_pppoe">
                            <option value="" selected="" disabled>--Select one--</option>
                            @foreach(\App\Models\Router::getSubscriptionProfileSelectOptions() as $pppprofile)
                                @if($pppprofile['value'] == $subscription->profile)
                                    <option value="{{ $pppprofile['value'] }}" selected="">{{ $pppprofile['label'] }}</option>
                                @else
                                    <option value="{{ $pppprofile['value'] }}">{{ $pppprofile['label'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: 70%;" id="hotspot-profile">
                        <div class="d-flex justify-content-start">Profile:</div>
                        <select class="btn btn-white border form-control rounded-pill" style="text-align:left;width:100%;" name="profile_hotspot">
                            <option value="" selected="" disabled>--Select one--</option>
                            <option value="default">default</option>
                        </select>
                    </div>
                </center>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif


@push('scripts_after')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#hotspot-address").hide();
            $("#hotspot-profile").hide();
            $('input[name="service"]').on("click", function() {
                if ($(this).val() === "Hotspot") {
                    $("#pppoe-address").hide();
                    $("#hotspot-address").show();
                    $("#hotspot-profile").show();
                    $("#pppoe-profile").hide();
                } else {
                    $("#pppoe-address").show();
                    $("#hotspot-address").hide();
                    $("#hotspot-profile").hide();
                    $("#pppoe-profile").show();
                }
            });
        });
    </script>
    <script>
        function getRandomSecret() {
            var random = Array.from(Array(8), () => Math.floor(Math.random() * 36).toString(36)).join('');
            document.getElementById("secret").value = random;
        }
    </script>
    <script>
        function getRandomSecretPass() {
            var random = Array.from(Array(8), () => Math.floor(Math.random() * 36).toString(36)).join('');
            document.getElementById("secretpass").value = random;
        }
    </script>
@endpush