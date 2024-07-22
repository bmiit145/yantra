<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolePermissions = [
            'admin' => [
                'manage user',
                'create user',
                'edit user',
                'delete user',
                'manage role',
                'create role',
                'edit role',
                'delete role',
                'manage permission',
                'manage crm',
                'manage lead'
            ],
            'user' => [
                'manage crm',
                'manage lead'
            ],
        ];

        // Loop through each role
        foreach ($rolePermissions as $roleName => $permissions) {
            // Find the role
            $role = Role::where('name', $roleName)->first();

            if ($role) {
                // Loop through permissions
                foreach ($permissions as $permissionName) {
                    // Find the permission
                    $permission = Permission::where('name', $permissionName)->first();

                    if ($permission) {
                        // Assign the permission to the role
                        $role->givePermissionTo($permission);
                    } else {
                        // Optionally log missing permissions
                        \Log::warning("Permission '{$permissionName}' not found for role '{$roleName}'.");
                    }
                }
            } else {
                // Optionally log missing roles
                \Log::warning("Role '{$roleName}' not found.");
            }
        }
    }
}