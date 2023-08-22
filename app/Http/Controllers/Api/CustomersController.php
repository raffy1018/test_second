<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Customer;
use App\Models\Subscription;

class CustomersController extends Controller
{
    /**
     * Data
     */
    // public function data() {

    //     $query = Customer::with('installation')
    //                 ->where('router_id', session('router_id'));

    //     return DataTables::eloquent($query)
    //         ->addColumn('installation_date', function($customer) {
    //             return \Carbon\Carbon::parse($customer->installation->date)->format('M. d, Y');
    //         })
    //         ->addColumn('col_action', function($customer) {
    //             return \View::make('backoffice.customers._col_action', compact('customer'));
    //         })
    //         ->rawColumns(['col_action', 'installation_date'])
    //         ->make(true);
    // }
    public function data() {

        $query = Customer::with('subscription', 'billing', 'profile', 'installation')
                    ->where('status', true)
                    ->where('router_id', session('router_id'));

        return DataTables::eloquent($query)
            ->addColumn('col_date', function($customer) {
                return \View::make('backoffice.customers._col_date', compact('customer'));
            })
            ->addColumn('col_details', function($customer) {
                return \View::make('backoffice.customers._col_details', compact('customer'));
            })
            ->addColumn('col_product', function($customer) {
                $subscription = $customer->subscription;
                return $subscription ? $subscription->product->name : '-' ;
            })
            ->addColumn('col_service', function($customer) {
                $subscription = $customer->subscription;
                return $subscription ? $subscription->service : '-' ;
            })
            ->addColumn('col_status', function($customer) {
                return \View::make('backoffice.customers._col_status', compact('customer'));
            })
            ->addColumn('col_balance', function($customer) {
                return \View::make('backoffice.customers._col_balance', compact('customer'));
            })
            ->addColumn('col_action', function($customer) {
                return \View::make('backoffice.customers._col_action', compact('customer'));
            })
            ->rawColumns(['col_action', 'col_product', 'col_details', 'col_date', 'col_status', 'col_balance', 'col_service'])
            ->make(true);
    }

    public function archived() {

        $query = Customer::with('subscription', 'billing', 'profile', 'installation')
                    ->where('status', false)
                    ->where('router_id', session('router_id'));

        return DataTables::eloquent($query)
            ->addColumn('col_date', function($customer) {
                return \View::make('backoffice.customers._col_date', compact('customer'));
            })
            ->addColumn('col_details', function($customer) {
                return \View::make('backoffice.customers._col_details', compact('customer'));
            })
            ->addColumn('col_product', function($customer) {
                $subscription = $customer->subscription;
                return $subscription ? $subscription->product->name : '-' ;
            })
            ->addColumn('col_service', function($customer) {
                $subscription = $customer->subscription;
                return $subscription ? $subscription->service : '-' ;
            })
            ->addColumn('col_status', function($customer) {
                return \View::make('backoffice.customers._col_status', compact('customer'));
            })
            ->addColumn('col_balance', function($customer) {
                return \View::make('backoffice.customers._col_balance', compact('customer'));
            })
            ->addColumn('col_action', function($customer) {
                return \View::make('backoffice.customers._col_action', compact('customer'));
            })
            ->rawColumns(['col_action', 'col_product', 'col_details', 'col_date', 'col_status', 'col_balance', 'col_service'])
            ->make(true);
    }
}
