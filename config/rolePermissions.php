<?php

return [
    'permissions' => [
        [
            'name' => 'manage users',
            'guard_name' => 'web',
        ],
        [
            'name' => 'create user',
            'guard_name' => 'web',
        ],
        [
            'name' => 'edit user',
            'guard_name' => 'web',
        ],
        [
            'name' => 'delete user',
            'guard_name' => 'web',
        ],
        [
            'name' => 'manage role',
            'guard_name' => 'web',
        ],
        [
            'name' => 'create role',
            'guard_name' => 'web',
        ],
        [
            'name' => 'edit role',
            'guard_name' => 'web',
        ],
        [
            'name' => 'delete role',
            'guard_name' => 'web',
        ],
        [
            'name' => 'manage permission',
            'guard_name' => 'web',
        ],
        [
            'name' => 'manage crm',
            'guard_name' => 'web',
        ],
        [
            'name' => 'manage lead',
            'guard_name' => 'web',
        ]
    ],
    'role_permissions' => [
        'admin' => [
            'manage users',
            'create user',
            'edit user',
            'delete user',
            'manage role',
            'create role',
            'edit role',
            'delete role',
            'manage permission',
            'manage crm',
            'manage lead',
        ],
        'user' => [
            'manage crm',
            'manage lead',
        ],
    ],
];
