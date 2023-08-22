<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketsController extends Controller
{
    public function index() {
        // need validation

        $refPrefix = 'REF#';
        $date = now();
        $number = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

        $reference = "{$refPrefix}-{$date->format('d-m-Y')}-{$number}";

        return view('backoffice.tickets.index', compact('reference'));
    }

    public function create() {
        //
    }

    public function store() {
        // need validation

        $ticket = new Ticket;

        $ticket->router_id = session('router_id');
        $ticket->fill(request()->all());
        $ticket->save();

        if(request()->has('files')) {
            $ticket->saveFilesUpload(request('files'));
        }

        return redirect()->route('backoffice.tickets.index');
    }

    public function show(Ticket $ticket) {

        return view('backoffice.tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket) {
        //
    }

    public function update(Ticket $ticket) {
        // need validation

        $ticket->fill(request()->all());
        $ticket->save();

        return redirect()->route('backoffice.tickets.index');
    }

    public function destroy(Ticket $ticket) {
        $files = $ticket->files;

        if($files) {
            foreach($files as $file) {
                $file->delete();
            }
        }

        $ticket->delete();

        return redirect()->route('backoffice.tickets.index');
    }
}
