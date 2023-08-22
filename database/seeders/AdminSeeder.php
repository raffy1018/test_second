<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Super Admin User
        $this->createSuperAdmin();
    }
    
    private function createSuperAdmin() {

        //create super admin user
        $admin = new User;
        $admin->first_name = 'Ofiber';
        $admin->last_name = 'Super Administrator';
        $admin->email = 'admin@ofiber.com';
        $admin->password = bcrypt('password');
        $admin->is_super_admin = true;
        $admin->save();
        
        $admin->assignRole('Super Administrator');
        
    }
}
