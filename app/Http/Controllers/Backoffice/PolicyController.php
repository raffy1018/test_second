<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index() {
        // need validation
        
        // return view('backoffice.subscriptions.products');
        return view('backoffice.policy.index');
    }

    public function create() {
        // need validation

        $policy = new Policy;

        return view('backoffice.policy.create', compact('policy'));
    }

    public function store() {
        // need validation

        $policy = new Policy;

        $policy->fill(request()->all());
        $policy->router_id = session('router_id');
        $policy->recipients = json_encode(request('recipients'));
        $policy->excepts = json_encode(request('excepts'));
        $policy->save();

        return redirect()->route('backoffice.policy.index');
    }

    public function edit(Policy $policy) {

        return view('backoffice.policy.edit', compact('policy'));
    }

    public function update(Policy $policy) {
        // need validation

        $policy->fill(request()->all());
        $policy->save();

        return redirect()->route('backoffice.policy.index');
    }

    public function destroy(Policy $policy) {
        $policy->delete();

        return redirect()->route('backoffice.policy.index');
    }
}
