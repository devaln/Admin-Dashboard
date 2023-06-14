<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete'
         ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('permission list');
        $role1->givePermissionTo('role list');
        $role1->givePermissionTo('user list');
        $role2 = Role::create(['name' => 'admin']);
        foreach ($permissions as $permission) {
            $role2->givePermissionTo($permission);
        }
        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        // create demo users
        $user = \App\Models\User::factory()->create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);
        $user->assignRole($role3);
        $user = \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin2@gmail.com',
        ]);
        $user->assignRole($role2);
        $user = \App\Models\User::factory()->create([
            'first_name' => 'Sachin',
            'last_name' => 'Jawale',
            'email' => 'sachin@gmail.com',
        ]);
        $user->assignRole($role1);

        Setting::create([
            'user_id' => $user->id,
            'site_name' => 'ADMIN-PANEL',
            'favicon' => 'assets/images/newlogo.jpg',
            'logo' => 'assets/images/newlogo.jpg',
            'type' => 'Logo',
            'footer' => '@Welcome TO Our Site',
        ]);
    }
}
