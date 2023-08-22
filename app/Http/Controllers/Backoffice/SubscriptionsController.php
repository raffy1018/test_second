<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Customer;
use App\Models\Billing;
use Carbon\Carbon;

class SubscriptionsController extends Controller
{
    public function index()
    {
        return view('backoffice.subscriptions-test.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // need validation

        $customer = \App\Models\Customer::find(request('customer_id'));

        $subscription = new Subscription;

        $subscription->router_id = session('router_id');
        $subscription->fill(request()->all());
        if(request('service') == 'PPPoE') {
            $subscription->local_ip_address = request('local_ip_address');
            $subscription->remote_ip_address = request('remote_ip_address');
            $subscription->profile = request('profile_pppoe');
        }
        if(request('service') == 'Hotspot') {
            $subscription->ip_address = request('ip_address');
            $subscription->profile = request('profile_hotspot');
        }
        $subscription->save();

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }

    public function show(Subscription $subscription)
    {
        $product = $subscription->product;
        $customer = $subscription->customer;
        $profile = $customer->profile;
        $installation = $customer->installation;

        // dd($subscription->router->getSystemResource(), $subscription->router->getPppProfile());

        return view('backoffice.subscriptions-test.show', compact('subscription', 'product', 'customer', 'profile', 'installation'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function activateBilling(Subscription $subscription) {
        $customer = Customer::find(request('customer_id'));

        $latestBilling = $subscription->latestBilling();
        
        $billing = new Billing;
        $billing->sales_invoice_no = Billing::generateSalesInvoice();
        $billing->fill(request()->all());
        $billing->subscription_id = $subscription->id;
        $billing->status = true;
        $billing->due_date = Carbon::parse(request('start_date'))->addMonth()->format('Y-m-d');
        $billing->price = $subscription->product->price;
        $billing->unpaid_bill = $latestBilling ? $latestBilling->balance : 0;
        $billing->save();

        $bill = $billing->price + $billing->unpaid_bill;
        $billing->balance = $bill - $billing->payment;
        $billing->save();

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }

    public function deactivateBilling(Subscription $subscription, Billing $latestBilling) {
        $customer = Customer::find(request('customer_id'));
        
        $latestBilling->status = false;
        $latestBilling->save();

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }

    public function reactivateBilling(Subscription $subscription, Billing $latestBilling) {
        $customer = Customer::find(request('customer_id'));
        
        $latestBilling->status = true;
        $latestBilling->save();

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }

    public function enableAccount(Subscription $subscription) {
        $subscription->enableAccount();
        
        return redirect()->route('backoffice.subscriptions.index');
    }

    public function disableAccount(Subscription $subscription) {
        $subscription->disableAccount();

        return redirect()->route('backoffice.subscriptions.index');
    }
}
