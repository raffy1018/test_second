<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        return view('backoffice.roles.index');
    }

    public function create()
    {
        $role = new Role;

        $router = \App\Models\Router::find(session('router_id'));

        $permissions = $role->getAllPermissions()->pluck('id');

        return view('backoffice.roles.create', compact('role', 'router', 'permissions'));
    }

    public function store(Request $request)
    {
        $role = new Role;

        // validation
        request()->validate($role->rules());

        $role->fill(request()->except('_token'));
        $role->guard_name = 'web';
        $role->save();

        return redirect()->route('backoffice.roles.index');
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        $permissions = $role->getAllPermissions()->pluck('id');

        return view('backoffice.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role)
    {
        // validation

        $role->fill(request()->except('_token'));
        $role->save();
        
        $role->savePermissions(request('permissions'));

        return redirect()->route('backoffice.roles.index');
    }

    public function destroy(Role $role)
    {
        if (in_array($role->name, ['Super Administrator'])) {
            return redirect()->route('backoffice.roles.index');
        }

        $role->delete();

        return redirect()->route('backoffice.roles.index');
    }
}
