<?php

return [

    'model' => \Rakhasa\Lutility\Models\Menu::class,

    'guards' => [
        'user' => \App\Models\User::class,
        // 'member' => \App\Models\Member::class,
    ],

    'list' => [
        'user' => [
            // [
            //     'name' => 'dashboard',
            //     'alias' => 'Dashboard',
            //     'icon' => 'pi pi-fw pi-home',
            //     'route' => 'user.dashboard',
            //     'group' => 'Home'
            // ],
        ],
        // 'member' => [
        //     [
        //         'name' => 'dashboard',
        //         'alias' => 'Dashboard',
        //         'icon' => 'pi pi-fw pi-home',
        //         'route' => 'member.dashboard',
        //         'group' => 'Home'
        //     ],
        // ]
    ]
];
