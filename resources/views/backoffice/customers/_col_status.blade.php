@php
$subscription = $customer->subscription;
@endphp

@if($subscription)
    @if($subscription->status)
    <span class="text-success">Enable</span><br>
    {{ $subscription->profile }}
    @else
    <span class="text-danger">Disable</span>
    @endif
@else
    -
@endif