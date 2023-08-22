<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Validation\Rule;

class Role extends SpatieRole
{
    use HasUid;

    protected $fillable = ['name', 'router_id'];

    public function rules($id = null) {
        return [
            'name' => [
                'required',
                'unique:roles,name,' . ($id ? $id : 'NULL') . ',id,router_id,' . request()->input('router_id')
            ]
        ];
    }

    /**
     * Relationships
    */
    public function router() {
        return $this->belongsTo(\App\Models\Router::class, 'router_id');
    }

    public static function getSelectOptions() {
        $options = [];
        foreach (\App\Role::AdminRole()->get() as $role) {
            $options[] = ['label' => $role->name, 'value' => $role->id];
        }

        return $options;
    }

    public function savePermissions($permissions) {
        $this->syncPermissions(collect($permissions)->keys());
    }
}
