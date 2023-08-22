<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'router_id'];
    
    public function rules() {

        $rules = [
            'name' => [
                'required',
                'unique:permissions,name,' . ($id ? $id : 'NULL') . ',id,router_id,' . request()->input('router_id')
            ]
        ];

        return $rules;
    }

    public static function getSystemPermissions() {

        return self::all()->groupBy('module');

    }

    public static function getModuleSelectOptions() {

        $options = [];
        
        $modules = self::all()->pluck('module')->unique();
        
        foreach ($modules as $module) {
            $options[] = ['label' => $module, 'value' => $module];
        }

        return $options;
        
    }

}
