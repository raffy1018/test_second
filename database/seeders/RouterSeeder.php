<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $router = new \App\Models\Router;
        $router->name = 'Router 1';
        $router->save();

        session(['router_id' => $router->id]);
    }
}
