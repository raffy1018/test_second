<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OltDevice;
use App\Models\PonPort;
use App\Models\NapDevice;
use App\Models\NapPort;

class OltDevicesController extends Controller
{
    public function index() {
        // need validation

        return view('backoffice.olt-devices.index');
    }

    public function store() {
        // need validation

        $oltDevice = new OltDevice;
        $oltDevice->router_id = session('router_id');
        $oltDevice->fill(request()->all());
        $oltDevice->save();

        $oltDevice->createNewPonPorts();

        return redirect()->route('backoffice.olt-devices.index');
    }

    public function show(OltDevice $oltDevice) {
        return view('backoffice.olt-devices.show', compact('oltDevice'));
    }

    public function edit(OltDevice $oltDevice) {
        //
    }

    public function update(OltDevice $oltDevice) {
        // need validation
        
        $oltDevice->fill(request()->all());
        $oltDevice->save();
        
        return redirect()->route('backoffice.olt-devices.index');
    }

    public function destroy(OltDevice $oltDevice) {
        // need validation

        $oltDevice->delete();

        return redirect()->route('backoffice.olt-devices.index');
    }

    public function nap(OltDevice $oltDevice, NapDevice $napDevice) {
        // need validation

        return view('backoffice.nap-devices.show', compact('oltDevice', 'napDevice'));
    }
}
