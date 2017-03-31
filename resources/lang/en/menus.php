<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Modules Options
    |--------------------------------------------------------------------------
    |
    */

    'maintenance' => [
        'customers'  => 'Customers',
        'vendors'    => 'Vendors & suppliers',
        'items'      => 'Items & units',
        'warehouse'  => 'Warehouse & locations',
        'countries'  => 'Countries & destinations',
        'reasons'    => 'Reasons & comments',
        'users'      => 'Users',
        'accounting' => 'Accounting codes',
        'drivers'    => 'Drivers & carriers',
        'divisions'  => 'Divisions & departments',
    ],
    'rates' => [
        'warehouse' => 'Warehouse rates',
        'pickup'    => 'Pickup & delivery rates',
        'courier'   => 'Courier rates',
        'air_exp'   => 'Export air rates',
        'ocean_exp' => 'Export ocean rates',
        'contract'  => 'Contract rates',
    ],
    'warehouse' => [
        'receipts'  => 'Receipts',
        'pickup'    => 'Pick Up & Delivery',
        'report'    => 'Reports',
    ],

    'export' => [
        'oceans'    => 'Ocean Export',
        'air'       => 'Air Export',
    ],
    'import' => [
        'oceans'    => 'Ocean Import',
        'air'       => 'Air Import',
    ],
    'accounting_bridge' => [
        'invoice_notes'    => 'Invoice and Credit Notes',
    ],
];