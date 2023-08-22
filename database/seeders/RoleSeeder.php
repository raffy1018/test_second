<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $router = \App\Models\Router::first();

        Role::create([
            'router_id' => $router->id,
            'name' => 'Super Administrator',
            'guard_name' => 'web',
        ]);

        Role::create([
            'router_id' => $router->id,
            'name' => 'Customer',
            'guard_name' => 'web',
        ]);
    }
}
