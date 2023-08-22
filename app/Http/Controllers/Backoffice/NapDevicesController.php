<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OltDevice;
use App\Models\PonPort;
use App\Models\NapDevice;
use App\Models\NapPort;

class NapDevicesController extends Controller
{
    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store() {
        // need validation

        if(!NapDevice::checkNapNoAvailability(request()->all())) {
            return redirect()->back()
                    ->withInput()
                    ->with(['alert' => 'danger', 'alert-message' => 'NAP number duplicate. Provide available NAP number.']);
        }

        $napDevice = new NapDevice;
        
        $napDevice->fill(request()->all());
        $napDevice->save();

        $napDevice->createNewNapPorts();

        return redirect()->to(request('_redirect'));
    }

    public function show(NapDevice $napDevice) {
        //
    }

    public function edit(NapDevice $napDevice) {
        //
    }

    public function update(NapDevice $napDevice) {
        // need validation

        if($napDevice->nap_no != request('nap_no') && !NapDevice::checkNapNoAvailability(request()->all())) {
            return redirect()->back()
                    ->withInput()
                    ->with(['alert' => 'danger', 'alert-message' => 'NAP number duplicate. Provide available NAP number.']);
        }

        $napDevice->fill(request()->all());
        $napDevice->save();
        
        return redirect()->to(request('_redirect'));
    }

    public function destroy(NapDevice $napDevice) {
        // need validation

        $napDevice->delete();

        return redirect()->to(request('_redirect'));
    }
}
