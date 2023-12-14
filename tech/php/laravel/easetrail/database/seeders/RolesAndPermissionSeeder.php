<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionNames = [
            'categories create', 'categories view', 'categories edit', 'categories delete',
            'products create', 'products view', 'products edit', 'products delete',
            'users create', 'users view', 'users edit', 'users delete',
            'vendors create', 'vendors view', 'vendors edit', 'vendors delete',
            'settings create', 'settings view', 'settings edit', 'settings delete'
        ];

        $permissions  = collect($arrayOfPermissionNames)->map(function($permission){
            return ['name' => $permission, 'guard_name' => 'api'];
        });

        Permission::insert($permissions->toArray());

        $role = Role::create(['name' => 'super admin'])->givePermissionTo($arrayOfPermissionNames);



    }
}
