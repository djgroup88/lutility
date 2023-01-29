<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Role
    |--------------------------------------------------------------------------
    |
    | This value contain the role configuration of the application. You can
    | determine value like model, level and many more configuration.
    |
    */

    'role' => [
        'model' => \Rakhasa\Lutility\Models\Role::class,
        'level' => [
            'superadmin' => 1,
            'admin' => 2,
            'user' => 3
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Permission
    |--------------------------------------------------------------------------
    |
    | This value contain the permission configuration of the application.
    | determine value like model, list permission, and other config.
    |
    */

    'permission' => [
        'model' => \Rakhasa\Lutility\Models\Permission::class,
        'list' => [
            [
                'name' => 'profile',
                'alias' => 'Profile',
                'actions' => ['read', 'update'],
            ],
            [
                'name' => 'user',
                'alias' => 'User',
                'actions' => ['create', 'read', 'update', 'delete', 'restore', 'manage_all']
            ]
        ]
    ]
];
