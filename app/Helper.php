<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    public static function getSystemPermissions() {

        $permissions = [];

        foreach(\Spatie\Permission\Models\Permission::where('router_id', session('router_id'))->get() as $permission) {

            $role = explode(' ', $permission->name);
            $name = $role[0];
            $group = $role[1];

            if(!isset($permissions[$group])) {
                $permissions[$group] = [];
            }

            $permissions[$group][] = ['name' => $name, 'id' => $permission->id];

        }

        return $permissions;
    }
}