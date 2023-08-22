<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Expense;

class ExpensesController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = Expense::query();

        return DataTables::eloquent($query)
            ->addColumn('col_action', function($expense) {
                return \View::make('backoffice.expenses._col_action', compact('expense'));
            })
            ->rawColumns(['col_action'])
            ->make(true);
    }
}
