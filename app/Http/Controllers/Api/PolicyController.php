<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Policy;

class PolicyController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = Policy::where('router_id', session('router_id'));

        return DataTables::eloquent($query)
            ->addColumn('col_action', function($policy) {
                return \View::make('backoffice.policy._col_action', compact('policy'));
            })
            ->rawColumns(['col_action'])
            ->make(true);
    }
}
