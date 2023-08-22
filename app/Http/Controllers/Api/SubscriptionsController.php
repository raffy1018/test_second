<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = Subscription::with('customer', 'product');

        return DataTables::eloquent($query)
            ->addColumn('col_date', function($subscription) {
                return \View::make('backoffice.subscriptions-test._col_date', compact('subscription'));
            })
            ->addColumn('col_action', function($subscription) {
                return \View::make('backoffice.subscriptions-test._col_action', compact('subscription'));
            })
            ->addColumn('col_details', function($subscription) {
                return \View::make('backoffice.subscriptions-test._col_details', compact('subscription'));
            })
            ->addColumn('col_status', function($subscription) {
                return \View::make('backoffice.subscriptions-test._col_status', compact('subscription'));
            })
            ->addColumn('col_balance', function($subscription) {
                return 'P'.$subscription->getBillingBalance();
            })
            ->rawColumns(['col_date', 'col_action', 'col_status', 'col_balance'])
            ->make(true);
    }

    public function archived() {

        $query = Subscription::with('user')
                    ->where('record_status', 'Archived');

        return DataTables::eloquent($query)
            ->addColumn('account', function($subscription) {
                return $subscription->user->profile->account_no;
            })
            ->make(true);
    }

    public function oltDevice() {
        $olt = \App\Models\OltDevice::find(request('olt'));
        
        $options = [];

        if($olt) {
            foreach($olt->ponPorts as $port) {
                $options[] = ['label' => $port->port, 'value' => $port->id];
            }
        }

        return $options;
    }

    public function ponPort() {
        $pon = \App\Models\PonPort::find(request('pon'));

        $options = [];

        if($pon) {
            foreach($pon->napDevices as $device) {
                $options[] = ['label' => $device->name . '(NAP number '.$device->nap_no.')', 'value' => $device->id];
            }
        }

        return $options;
    }

    public function napDevice() {
        $nap = \App\Models\NapDevice::find(request('nap'));

        $options = [];

        if($nap) {
            foreach($nap->napPorts as $port) {
                if($port->customer_account_no == '' || $port->customer_account_no == request('account_no')) {
                    $options[] = ['label' => $port->port, 'value' => $port->id];
                }
            }
        }

        return $options;
    }
}
