<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Multi-Tenancy Sidebar Menu
    |--------------------------------------------------------------------------
    |
    | This value determines whether the 'Tenants' menu item is shown in the
    | admin sidebar on the landlord domain. Set to false to hide it.
    |
    */
    'show_menu' => true,

    /*
    |--------------------------------------------------------------------------
    | Tenant Database Prefix
    |--------------------------------------------------------------------------
    |
    | This prefix is added to the generated database name for each tenant.
    | Default is 'krayin_'. Example: 'krayin_company1'.
    |
    */
    'database_prefix' => 'krayin_',


    /*|--------------------------------------------------------------------------
    | Tenant Menu Item Sort Order
    |--------------------------------------------------------------------------
    | This value determines the sort order of the 'Tenants' menu item
    | in the admin sidebar. Lower values appear higher in the menu.
    |*/
    'sort' => 8, // after settings menu

    /*
    |--------------------------------------------------------------------------
    | Tenant Table Name
    |--------------------------------------------------------------------------
    |
    | This is the name of the table that stores tenant information in the
    | landlord database. Default is 'tenants'.
    |
    */
    'table_name' =>  'tenants',

    /*
    |--------------------------------------------------------------------------
    | Landlord Database Connection Name
    |--------------------------------------------------------------------------
    |
    | This is the name of the database connection used for the landlord database.
    | Default is 'landlord'.
    |
    */
    'landlord_connection_name' => 'landlord',
];
