<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; 

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
    $admin = Role::create(['name' => 'admin']);
    $user = Role::create(['name' => 'user']);

    // Create permissions
    $manageAdminSection = Permission::create(['name' => 'manage_admin_section']);
    $accessUserSection = Permission::create(['name' => 'access_user_section']);

    // Assign permissions to roles
    $admin->givePermissionTo($manageAdminSection);
    $user->givePermissionTo($accessUserSection);

    // Assign roles to users
    $adminUser = User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('12345678')
    ]);
    $adminUser->assignRole($admin);

    $regularUser = User::create([
        'name' => 'Regular User',
        'email' => 'user@example.com',
        'password' => bcrypt('12345678')
    ]);
    $regularUser->assignRole($user);
    }
}
