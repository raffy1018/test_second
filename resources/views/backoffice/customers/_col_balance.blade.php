<span class="{{ $customer->total_balance['total'] >= 0 ? 'text-success' : 'text-danger' }}">
    P{{ $customer->total_balance['total'] }} 
    @if($customer->total_balance['advance'])
        <span style="font-size: 0.6rem;">ADV</span>
    @endif
</span>