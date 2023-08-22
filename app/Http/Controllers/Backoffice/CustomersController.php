<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Installation;
use App\Models\AdvanceProfile;
use App\Models\NapPort;

class CustomersController extends Controller
{
    
    public function index() {
        // need validation

        return view('backoffice.customers.index');
    }
    
    public function archived() {
        // need validation

        return view('backoffice.customers.archived');
    }

    public function create() {
        // need validation

        $customer = new Customer;

        $profile = $customer->profile;
        $installation = $customer->installation;

        return view('backoffice.customers.create', compact('customer', 'profile', 'installation'));
    }

    public function store() {
        // need validation

        $customer = new Customer;

        request()->validate($customer->rules());

        $customer->fill(request()->all());
        $customer->router_id = session('router_id');
        $customer->save();

        // Customer Advance Profile
        if(request()->has('olt_device')) {
            $advance = new AdvanceProfile;
            $advance->fill(request()->all());
            $advance->customer_id = $customer->id;
            $advance->olt_device_id = request('olt_device');
            $advance->pon_port_id = request('pon_port');
            $advance->nap_device_id = request('nap_device');
            $advance->nap_port_id = request('nap_port');
            $advance->save();

            // NAP Port
            $napPort = NapPort::find(request('nap_port'));
            $napPort->customer_account_no = $customer->account_no;
            $napPort->customer_name = $customer->name;
            $napPort->first_remarks = request('remarks_1');
            $napPort->second_remarks = request('remarks_2');
            $napPort->save();
        }

        // Customer Installation
        if(request('installation_date') != '') {
            $installation = new Installation;
            $installation->customer_id = $customer->id;
            $installation->date = request('installation_date');
            $installation->remarks = request('notes');
            $installation->save();
        }

        return redirect()->route('backoffice.subscriptions.customers.index');
    }

    public function show(Customer $customer) {
        // need validation

        $profile = $customer->profile;
        $installation = $customer->installation;
        $subscription = $customer->subscription;
        $billing = $customer->billing;

        return view('backoffice.customers.show', compact('customer', 'profile', 'installation', 'subscription', 'billing'));
    }

    public function edit(Customer $customer) {
        // need validation
        
        $profile = $customer->profile;
        $installation = $customer->installation;

        return view('backoffice.customers.edit', compact('customer', 'profile', 'installation'));
    }

    public function update(Customer $customer) {
        // need validation

        $profile = $customer->profile;
        $installation = $customer->installation;

        // Customer
        $customer->fill(request()->all());
        $customer->save();

        // NAP Port Delete
        $napPort = NapPort::find($profile->nap_port_id);
        $napPort->customer_account_no = '';
        $napPort->customer_name = '';
        $napPort->first_remarks = '';
        $napPort->second_remarks = '';
        $napPort->save();

        // Installation
        $installation->date = request('installation_date');
        $installation->remarks = request('notes');
        $installation->save();
        
        // Advance Profile
        $advance->fill(request()->all());
        $advance->customer_id = $customer->id;
        $advance->olt_device_id = request('olt_device');
        $advance->pon_port_id = request('pon_port');
        $advance->nap_device_id = request('nap_device');
        $advance->nap_port_id = request('nap_port');
        $advance->save();

        // NAP Port
        $napPort = NapPort::find(request('nap_port'));
        $napPort->customer_account_no = $customer->account_no;
        $napPort->customer_name = $customer->name;
        $napPort->first_remarks = request('remarks_1');
        $napPort->second_remarks = request('remarks_2');
        $napPort->save();

        return redirect()->route('backoffice.customers.index');
    }

    public function destroy(Customer $customer) {
        // need validation

        // TODO: hold the billing
        $customer->status = false;
        $customer->save();

        return redirect()->route('backoffice.subscriptions.customers.index');
    }

    public function removeAccount(Customer $customer) {
        $customer->delete();

        return redirect()->route('backoffice.subscriptions.customers.index');
    }

    public function forceDelete(Customer $customer) {
        // need validation

        // $profile = $customer->profile;
        // $installation = $customer->installation;

        // // NAP Port Delete
        // $napPort = NapPort::find($profile->nap_port_id);
        // $napPort->customer_account_no = '';
        // $napPort->customer_name = '';
        // $napPort->first_remarks = '';
        // $napPort->second_remarks = '';
        // $napPort->save();

        // $installation->delete();
        // $profile->delete();
        $customer->delete();

        return redirect()->route('backoffice.subscriptions.customers.index');
    }
}
