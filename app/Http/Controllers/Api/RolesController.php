<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = Role::query();

        return DataTables::eloquent($query)
            ->addColumn('col_action', function($role) {
                return \View::make('backoffice.roles._col_action', compact('role'));
            })
            ->rawColumns(['col_action'])
            ->make(true);
    }
}
