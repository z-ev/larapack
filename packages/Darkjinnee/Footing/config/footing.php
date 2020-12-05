<?php

return [

    /** Field for check auth */
    'username' => 'email',

    /** Array usernames developers */
    'developers' => ['test@gmail.ru'],

    /** Register and Login */
    'auth' => [
        /** Routes group */
        'routes' => [
            'prefix' => 'api/auth',
            'name' => 'api.auth.',
            'middleware' => ['api'],
        ],
        /** Form request */
        'requests' => [
            'register' => [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'token_name' => ['string']
            ],
            'token' => [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'token_name' => ['string']
            ]
        ],
    ],

    /** Roles and Permissions */
    'resources' => [
        /** Routes group */
        'routes' => [
            'prefix' => 'api/resources',
            'name' => 'api.resources.',
            'middleware' => ['api'],
        ],
        /** Form request */
        'requests' => [
            'role' => [
                'store' => [

                ],
                'update' => [

                ]
            ],
            'permission' => [
                'store' => [

                ],
                'update' => [

                ]
            ],
        ],
    ],
];
