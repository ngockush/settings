<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Table Name
    |--------------------------------------------------------------------------
    |
    | Database Settings Table Name
    |
    */
    'table_name' => 'settings',

    /*
    |--------------------------------------------------------------------------
    | Route Name
    |--------------------------------------------------------------------------
    |
    | Routing Name
    |
    */
    'route_name' => 'setting',

    /*
    |--------------------------------------------------------------------------
    | Config Prefix
    |--------------------------------------------------------------------------
    |
    | The prefix used to add your settings into the configuration array.
    | With this default you can grab your settings with: config('settings.your_setting_key')
    |
    | WARNING: WE ADVISE TO NOT LEAVE THIS EMPTY / CHECK IF IT DOES NOT CONFLICT WITH OTHER CONFIG FILE NAMES
    |
    |   - if you leave this empty and your keys match other configuration files you might ovewrite them.
    |
    */
    'config_prefix' => 'settings',
];
