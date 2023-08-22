<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\OltDevice;
use App\Models\PonPort;

class OltDevicesController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = OltDevice::query();

        return DataTables::eloquent($query)
            ->addColumn('col_nap', function($olt) {
                return $olt->getTotalNap();
            })
            ->addColumn('col_onu', function($olt) {
                return $olt->getTotalOnu();
            })
            ->addColumn('col_action', function($olt) {
                return \View::make('backoffice.olt-devices._col_action', compact('olt'));
            })
            ->rawColumns(['col_action', 'col_nap', 'col_onu'])
            ->make(true);
    }

    public function port() {
        $query = PonPort::query();

        return DataTables::eloquent($query)
            ->addColumn('col_nap', function($pon) {
                return $pon->getTotalNap();
            })
            ->addColumn('col_onu', function($pon) {
                return $pon->getTotalOnu();
            })
            ->addColumn('col_column', function($pon) {
                return \View::make('backoffice.pon-ports._col_column', compact('pon'));
            })
            ->addColumn('col_action', function($pon) {
                return \View::make('backoffice.pon-ports._col_action', compact('pon'));
            })
            ->rawColumns(['col_action', 'col_nap', 'col_onu', 'col_column'])
            ->make(true);
    }

    public function nap() {
        $napDevice = \App\Models\NapDevice::find(request('nap_device_id'));
        $ponPort = $napDevice->ponPort;
        $oltDevice = $ponPort->oltDevice;

        $query = \App\Models\AdvanceProfile::where('olt_device_id', $oltDevice->id)
                                            ->where('pon_port_id', $ponPort->id)
                                            ->where('nap_device_id', $napDevice->id);

        return DataTables::eloquent($query)
            ->make(true);
    }
}
