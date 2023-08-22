<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Customer;
use App\Models\Subscription;
use Carbon\Carbon;

class BillingsController extends Controller
{
    public function activate() {

        $billing = new Billing;
        $billing->fill(request()->except('_token'));
        $billing->save();

        $customer = Customer::find(request('customer_id'));

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }

    public function deactivate(Billing $billing) {
        $billing->status = false;
        $billing->save();

        $customer = Customer::find($billing->customer_id);

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }

    public function reactivate(Billing $billing) {
        $billing->status = true;
        $billing->start_date = Carbon::now()->format('Y-m-d');
        $billing->save();

        $customer = Customer::find($billing->customer_id);

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }
}
