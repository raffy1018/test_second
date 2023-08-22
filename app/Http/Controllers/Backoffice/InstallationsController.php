<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Installation;
use App\Models\Subscription;
use Carbon\Carbon;

class InstallationsController extends Controller
{
    public function activateBilling(Installation $installation) {
        $customer = Customer::find(request('customer_id'));
        
        $installation->billing_status = true;
        $installation->billing_type = request('type');
        $installation->days_before_due_date = request('bill_date');
        $installation->activate_at = request('start_date');
        $installation->due_date = Carbon::parse(request('start_date'))->addMonth()->format('Y-m-d');
        $installation->save();

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }

    public function deactivateBilling(Installation $installation) {
        $customer = Customer::find(request('customer_id'));
        
        $installation->billing_status = false;
        $installation->save();

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }
}
