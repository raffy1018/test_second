<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Voucher;

class VouchersController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = Voucher::query();

        return DataTables::eloquent($query)
            ->addColumn('col_action', function($voucher) {
                return \View::make('backoffice.voucher._col_action', compact('voucher'));
            })
            ->rawColumns(['col_action'])
            ->make(true);
    }
}
