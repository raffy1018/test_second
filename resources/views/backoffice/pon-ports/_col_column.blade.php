<div class="w-75">
    @forelse($pon->napDevices as $napDevice)
    <div class="d-flex justify-content-between">
        <div>
            <a href="{{ route('backoffice.olt-devices.nap-device', ['oltDevice' => $napDevice->ponPort->oltDevice, 'napDevice' => $napDevice]) }}" class="text-decoration-none text-primary" style="">
                <span class="text-secondary" style="font-size:0.8rem;">NAME:</span> {{ $napDevice->name }} | 
                <span class="text-secondary" style="font-size:0.8rem;">NAP:</span> {{ $napDevice->nap_no }} | 
                <span class="text-secondary" style="font-size:0.8rem;">ONU:</span> {{ $napDevice->getTotalOnu() }} | 
                <span class="text-secondary" style="font-size:0.8rem;">TOTAL PORTS:</span> {{ $napDevice->nap_ports_no }}
            </a>
        </div>
        <div>
            <a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#edit-nap-modal-{{ $napDevice->id }}">
                <i class="fas fa-edit text-warning"></i>
            </a>

            <a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#delete-nap-modal-{{ $napDevice->id }}">
                <i class="fas fa-trash-alt text-danger"></i>
            </a>

            @include('backoffice.pon-ports._modals')
        </div>
    </div>
    @empty
    <div>
        <em>No data.</em>
    </div>
    @endforelse
</div>