<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Router;

class RoutersController extends Controller
{
    public function index() {
        // need validation

        return view('backoffice.routers.index');
    }

    public function create() {
        // need validation

        return view('backoffice.routers.create');
    }

    public function store() {
        // need validation

        $router = new Router;

        $router->name = 'Mikrotik';
        $router->fill(request()->all());
        $router->save();

        $router->connect();

        return redirect()->route('backoffice.routers.index');
    }

    public function edit(Router $router) {

        return view('backoffice.routers.edit', compact('router'));
    }

    public function update(Router $router) {
        // need validation

        $router->fill(request()->all());
        $router->save();

        $router->connect();

        return redirect()->route('backoffice.routers.index');
    }

    public function destroy(Router $router) {
        $router->delete();

        return redirect()->route('backoffice.routers.index');
    }
}
