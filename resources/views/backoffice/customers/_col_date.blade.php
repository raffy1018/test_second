@php
$billing = $customer->billing;
if($billing) {
    $due_date = \Carbon\Carbon::parse($billing->start_date)->addMonth();
}
@endphp
<b>Due Date:</b> {{ $billing && $billing->status ? $due_date->copy()->format('Y-M-d') : '-' }}<br>
<b>Bill:</b> {{ $billing && $billing->status ? $due_date->copy()->subDays($billing->bill_date)->format('Y-M-d') : '-' }}