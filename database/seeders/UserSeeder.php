<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a specific admin user
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'), // You should choose a secure password
        ]);

        // Assuming you have a Role model and users can have roles
        $adminRole = Role::where('name', 'admin')->first();

        // If using a simple relation without a package
        if ($adminRole) {
            $admin->roles()->attach($adminRole);
        }
    }
}
