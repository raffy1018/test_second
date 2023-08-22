<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ticket;

class TicketsController extends Controller
{
    /**
     * Data
     */
    public function data() {
        $query = Ticket::with('customer')
                        ->where('router_id', session('router_id'));

        return DataTables::eloquent($query)
            ->addColumn('account_no', function($ticket) {
                return $ticket->customer->account_no;
            })
            ->addColumn('account_name', function($ticket) {
                return $ticket->customer->name;
            })
            ->addColumn('col_subject', function($ticket) {
                return \View::make('backoffice.tickets._col_subject', compact('ticket'));
            })
            ->addColumn('col_action', function($ticket) {
                return \View::make('backoffice.tickets._col_action', compact('ticket'));
            })
            ->rawColumns(['col_action', 'col_subject'])
            ->make(true);
    }
}
