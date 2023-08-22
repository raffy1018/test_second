<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Subscription;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Billing;
use Carbon\Carbon;

class TransactionsController extends Controller
{
    public function index() {
        //
    }

    public function create() {
        //
    }
    public function store() {
        // validation

        $customer = Customer::find(request('customer_id'));

        if(request('amount') == '') {
            return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
        }

        $transaction = new Transaction;

        $transaction->fill(request()->all());
        $transaction->invoice_no = Transaction::generateSalesInvoice();
        if(request('type') == 'Payment') { //credit
            $transaction->credit = request('amount');
        } else {
            $transaction->debit = request('amount');
        }
        $transaction->creatable_id = auth()->user()->id;
        $transaction->creatable_type = get_class(auth()->user());
        $transaction->save();

        // change billing
        $billing = $customer->billing;
        $billing->start_date = Carbon::parse($billing->start_at)->addMonth()->format('Y-m-d');
        $billing->save();

        return redirect()->route('backoffice.subscriptions.customers.show', compact('customer'));
    }

    public function show(Transaction $transaction) {
        //
    }

    public function edit(Transaction $transaction) {
        //
    }

    public function update(Transaction $transaction) {
        //
    }
    
    public function destroy(Transaction $transaction) {
        dd($transaction);
    }
    
    // payments
    public function payments() {
        return view('backoffice.transactions.payments');
    }

    // charges
    public function charges() {
        return view('backoffice.transactions.charges');
    }
}
