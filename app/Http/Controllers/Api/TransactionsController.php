<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    /**
     * Payments
     */
    public function payments() {
        $query = Transaction::with('customer')->whereNotNull('credit');

        return DataTables::eloquent($query)
            ->addColumn('col_account', function($transaction) {
                return \View::make('backoffice.transactions._col_account', compact('transaction'));
            })
            ->rawColumns(['col_account'])
            ->make(true);
    }

    /**
     * Charges
     */
    public function charges() {
        $query = Transaction::with('customer')->whereNotNull('debit');

        return DataTables::eloquent($query)
            ->addColumn('col_account', function($transaction) {
                return \View::make('backoffice.transactions._col_account', compact('transaction'));
            })
            ->rawColumns(['col_account'])
            ->make(true);
    }
}
