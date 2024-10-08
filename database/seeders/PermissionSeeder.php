<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $arrPermission = [
//            [
//                'name' => 'manage users',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'create user',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'edit user',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'delete user',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'manage role',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'create role',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'edit role',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'delete role',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'manage permission',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'manage crm',
//                'guard_name' => 'web',
//            ],
//            [
//                'name' => 'manage lead',
//                'guard_name' => 'web',
//            ]
//        ];

        $arrPermission = config('rolePermissions.permissions');
        // create if not exists
        foreach ($arrPermission as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']], // Search criteria
                $permission
            );
        }

//        Permission::firstOrInsert(['name' => $arrPermission['name']] , $arrPermission);

    }
}
