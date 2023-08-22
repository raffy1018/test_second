<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Active Router
     */
    public function router() {
        $router = \App\Models\Router::find(request('router_id'));

        if($router) {
            session(['router_id' => $router->id]);
        }
    }
}
