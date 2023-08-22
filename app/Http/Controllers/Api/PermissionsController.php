<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = Permission::query();

        return DataTables::eloquent($query)
            ->addColumn('col_action', function($permission) {
                return \View::make('backoffice.permissions._col_action', compact('permission'));
            })
            ->rawColumns(['col_action'])
            ->make(true);
    }
}
