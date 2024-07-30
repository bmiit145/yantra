<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:rolePermissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign Permissions to Roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $rolePermissions = [
//            'admin' => [
//                'manage user',
//                'create user',
//                'edit.blade.php user',
//                'delete user',
//                'manage role',
//                'create role',
//                'edit.blade.php role',
//                'delete role',
//                'manage permission',
//                'manage crm',
//                'manage lead'
//            ],
//            'user' => [
//                'manage crm',
//                'manage lead'
//            ],
//        ];

        $rolePermissions = config('rolePermissions.role_permissions');

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
                        $this->info("Assigned permission '{$permissionName}' to role '{$roleName}'.");
                    } else {
                        // Optionally log missing permissions
                        \Log::warning("Permission '{$permissionName}' not found for role '{$roleName}'.");
                        $this->warn("Permission '{$permissionName}' not found for role '{$roleName}'.");
                    }
                }
            } else {
                \Log::warning("Role '{$roleName}' not found.");
                $this->warn("Role '{$roleName}' not found.");
            }
        }

        return Command::SUCCESS;

    }
}
