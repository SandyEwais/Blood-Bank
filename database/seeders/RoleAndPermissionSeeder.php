<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'article-access',
            'article-edit',
            'article-delete',
            'article-create',
            'category-access',
            'category-edit',
            'category-delete',
            'category-create',
            'user-access',
            'user-edit',
            'user-delete',
            'user-create',
            'client-access',
            'client-activate',
            'client-delete',
            'governorate-access',
            'governorate-edit',
            'governorate-delete',
            'governorate-create',
            'city-access',
            'city-edit',
            'city-delete',
            'city-create',
            'donationRequest-access',
            'donationRequest-delete',
            'role-access',
            'role-edit',
            'role-delete',
            'role-create',
            'contactMessage-access',
            'contactMessage-delete',
            'settings-access',
            'settings-edit',
        ];
        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);
        
    }
}
