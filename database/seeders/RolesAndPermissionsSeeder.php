<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create an 'admin' role
        $adminRole = Role::create(['name' => 'admin']);

        // Create permissions
        $editProducts = Permission::create(['name' => 'edit products']);
        $deleteProducts = Permission::create(['name' => 'delete products']);

        // Attach permissions to the 'admin' role
        $adminRole->permissions()->attach([$editProducts->id, $deleteProducts->id]);
    }
}
