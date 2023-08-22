<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('backoffice.permissions.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $permission = new Permission;

        // validation
        request()->validate($permission->rules());

        $permission->fill(request()->except('_token'));
        $permission->guard_name = 'web';
        $permission->save();

        return redirect()->route('backoffice.permissions.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Permission $permission)
    {
        request()->validate($permission->rules());

        $permission->fill(request()->except('_token'));
        $permission->guard_name = 'web';
        $permission->save();

        return redirect()->route('backoffice.permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('backoffice.permissions.index');
    }

    public function storeModule() {
        request()->validate([
            'name' => 'required'
        ]);

        $moduleName = request('name');

        $defaultPermissions = ['view', 'create', 'edit', 'delete'];

        foreach($defaultPermissions as $defaultPermission) {

            $permissionName = $defaultPermission.' '.\Str::plural($moduleName);

            //check if already exists, if not create
            $isExisting = Permission::where(['name' => $permissionName])->first();

            if (!$isExisting) {
                $permission = new Permission;
                $permission->router_id = request('router_id');
                $permission->name = $permissionName;
                $permission->description = 'Ability to '.$defaultPermission.' '.$moduleName;
                $permission->guard_name = 'web';
                $permission->save();
            }

        }

        return redirect()->route('backoffice.permissions.index');
    }
}
