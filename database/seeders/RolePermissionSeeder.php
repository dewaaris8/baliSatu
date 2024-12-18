<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage categories',
            'manage packages',
            'manage inclusions',
            'manage plans',
            'manage package banks',
            'checkout package',
            'manage transactions',
            'view orders',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }
        
        $customerRole = Role::firstOrCreate([
           'name' => 'customer'
        ]);

        $customerPermissions = [
            'checkout package',
            'view orders',
        ];

        $customerRole->syncPermissions($customerPermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => "Super Admin",
            'email' => "super@admin.com",
            'phone_number' => "6281337241677",
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt(88888888),
        ]);
        $user->assignRole($superAdminRole);


    }
}
