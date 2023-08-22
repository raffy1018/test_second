<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VouchersController extends Controller
{
    public function index() {
        // need validation
        
        return view('backoffice.vouchers.index');
    }
}
