<div class="row">
    <div class="col-md-6 text-center">
        <input type="radio" name="type" value="Postpaid" id="policy_type" @if($policy->type === 'Postpaid') checked @endif checked="{{ $policy->type ? 'true' : 'false' }}">
        <label for="policy_type">
            POSTPAID
        </label>
    </div>
    <div class="col-md-6 text-center">
        <input type="radio" name="type" value="Prepaid" id="policy_type" @if($policy->type === 'Prepaid') checked @endif>
        <label for="policy_type">
            PREPAID
        </label>
    </div>
</div>
<div class="form-group">
    <label for="name">Policy Name</label>
    <input type="text" class="form-control" name="name" value="{{ $policy->name ? $policy->name : '' }}" id="name" placeholder="Enter Policy Name" required>
</div>
<div class="form-group">
    <label for="recipient">Recipient</label>
    <select class="select2 select2-multiple form-control" multiple="multiple" name="recipients[]" id="recipient">
        @foreach(\App\Models\Customer::all() as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="filter">Filter</label>
    <select class="form-control select2" style="width:100%" name="filter" id="filter" required>
        <option selected disabled>-- Select one --</option>
        @foreach(\App\Models\Policy::getFilterSelectOptions() as $filter)
            @if($policy->filter == $filter['value'])
                <option value="{{ $filter['value'] }}" selected>{{ $filter['label'] }}</option>
            @else
                <option value="{{ $filter['value'] }}">{{ $filter['label'] }}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="except">Except</label>
    <select class="select2 select2-multiple form-control" multiple="multiple" name="excepts[]" id="except">
        @foreach(\App\Models\Customer::all() as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
    </select>
</div>

<div class="w-100 p-2 border my-3">
    <span class="text-center my-2">
        <h5 class="mb-0">PPPOE</h5>
    </span>

    <div class="row">
        <div class="col-md-6 text-center">
            <input type="radio" name="pppoe_action" value="Disable" id="pppoe_action" @if($policy->pppoe_action === 'Disable') checked @endif checked="{{ $policy->pppoe_action ? 'true' : 'false' }}">
            <label for="pppoe_action">
                Disable
            </label>
        </div>
        <div class="col-md-6 text-center">
            <input type="radio" name="pppoe_action" value="Profile" id="pppoe_action" @if($policy->pppoe_action === 'Profile') checked @endif>
            <label for="pppoe_action">
                Profile
            </label>
        </div>
    </div>
    <div class="form-group" id="pppoe-to-profile">
        <label for="pppoe_to_profile">to Profile</label>
        <select class="form-control" style="width:100%" name="pppoe_to_profile" id="pppoe_to_profile">
            <option selected disabled>-- Select one --</option>
        </select>
    </div>
    <div id="postpaid-pppoe">
        <div class="form-group">
            <label for="pppoe_over_due">When Over Due is</label>
            <select class="form-control" style="width:100%" name="pppoe_over_due" id="pppoe_over_due">
                <option selected disabled>-- Select one --</option>
                @foreach(\App\Models\Policy::getOverDueSelectOptions() as $due)
                    @if($policy->pppoe_over_due == $due['value'])
                        <option value="{{ $due['value'] }}" selected>{{ $due['label'] }}</option>
                    @else
                        <option value="{{ $due['value'] }}">{{ $due['label'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pppoe_grace_period">Grace Period of</label>
            <input type="text" class="form-control" name="pppoe_grace_period" value="{{ $policy->pppoe_grace_period ? $policy->pppoe_grace_period : '' }}" id="pppoe_grace_period" placeholder="Enter Grace Period">
            <div class="text-info" style="font-size:0.8rem;">
                Grace Period in Days
            </div>
        </div>
        <div class="form-group">
            <label for="pppoe_return_balance">Return if Balance is</label>
            <select class="form-control" style="width:100%" name="pppoe_return_balance" id="pppoe_return_balance">
                <option selected disabled>-- Select one --</option>
                @foreach(\App\Models\Policy::getReturnBalanceSelectOptions() as $balance)
                    @if($policy->pppoe_return_balance == $balance['value'])
                        <option value="{{ $balance['value'] }}" selected>{{ $balance['label'] }}</option>
                    @else
                        <option value="{{ $balance['value'] }}">{{ $balance['label'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="w-100 p-2 border my-3">
    <span class="text-center my-2">
        <h5 class="mb-0">HOTSPOT</h5>
    </span>

    <div class="row">
        <div class="col-md-6 text-center">
            <input type="radio" name="hotspot_action" value="Disable" id="hotspot_action" @if($policy->hotspot_action === 'Disable') checked @endif  checked="{{ $policy->hotspot_action ? 'true' : 'false' }}">
            <label for="hotspot_action">
                Disable
            </label>
        </div>
        <div class="col-md-6 text-center">
            <input type="radio" name="hotspot_action" value="Profile" id="hotspot_action" @if($policy->hotspot_action === 'Profile') checked @endif>
            <label for="hotspot_action">
                Profile
            </label>
        </div>
    </div>
    <div class="form-group" id="hotspot-to-profile">
        <label for="hotspot_to_profile">to Profile</label>
        <select class="form-control" style="width:100%" name="hotspot_to_profile" id="hotspot_to_profile">
            <option selected disabled>-- Select one --</option>
        </select>
    </div>
    <div id="postpaid-hotspot">
        <div class="form-group">
            <label for="hotspot_over_due">When Over Due is</label>
            <select class="form-control" style="width:100%" name="hotspot_over_due" id="hotspot_over_due">
                <option selected disabled>-- Select one --</option>
                @foreach(\App\Models\Policy::getOverDueSelectOptions() as $due)
                    @if($policy->hotspot_over_due == $due['value'])
                        <option value="{{ $due['value'] }}" selected>{{ $due['label'] }}</option>
                    @else
                        <option value="{{ $due['value'] }}">{{ $due['label'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="hotspot_grace_period">Grace Period of</label>
            <input type="text" class="form-control" name="hotspot_grace_period" value="{{ $policy->hotspot_grace_period ? $policy->hotspot_grace_period : '' }}" id="hotspot_grace_period" placeholder="Enter Grace Period">
            <div class="text-info" style="font-size:0.8rem;">
                Grace Period in Days
            </div>
        </div>
        <div class="form-group">
            <label for="hotspot_return_balance">Return if Balance is</label>
            <select class="form-control" style="width:100%" name="hotspot_return_balance" id="hotspot_return_balance">
                <option selected disabled>-- Select one --</option>
                @foreach(\App\Models\Policy::getReturnBalanceSelectOptions() as $balance)
                    @if($policy->hotspot_return_balance == $balance['value'])
                        <option value="{{ $balance['value'] }}" selected>{{ $balance['label'] }}</option>
                    @else
                        <option value="{{ $balance['value'] }}">{{ $balance['label'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>

@push('scripts_after')
<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('input[name="type"]').on("click", function() {
            if ($(this).val() === "Prepaid") {
                $("#postpaid-pppoe").hide();
                $("#postpaid-hotspot").hide();
            } else {
                $("#postpaid-pppoe").show();
                $("#postpaid-hotspot").show();
            }
        });

        $("#pppoe-to-profile").hide();
        $('input[name="pppoe_action"]').on("click", function() {
            if ($(this).val() === "Profile") {
                $("#pppoe-to-profile").show();
            } else {
                $("#pppoe-to-profile").hide();
            }
        });

        $("#hotspot-to-profile").hide();
        $('input[name="hotspot_action"]').on("click", function() {
            if ($(this).val() === "Profile") {
                $("#hotspot-to-profile").show();
            } else {
                $("#hotspot-to-profile").hide();
            }
        });
    });
</script>
@endpush