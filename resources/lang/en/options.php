<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Modules Options
    |--------------------------------------------------------------------------
    |
    */

    'maintenance' => [
        'customers'  => [
            'types'         => 'Customer types',
            'business'      => 'Business types',
            'sales_rep'     => 'Sales representatives',
            'contact'       => 'Contact types',
            'id'            => 'Identification types',
            'payment'       => 'Payment terms',
            'incoterm'      => 'Incoterms',
            'customers'     => 'Customers',
        ],
        'vendors'    => [
            'types'         => 'Vendors types',
            'vendors'       => 'Vendors',
            'suppliers'     => 'Suppliers',
        ],
        'items'      => [
            'units'         => 'Units',
            'equipment'     => 'Equipment types',
            'commodities'   => 'Commodities',
            'services'      => 'Services',
            'shipment'      => 'Shipment types',
            'category'      => 'Items categories',
            'subcategory'   => 'Items subcategories',
            'items'         => 'Items',
        ],
        'warehouse'  => [
            'cargo'         => 'Cargo types',
            'irregular'     => 'Cargo irregularities',
            'facilities'    => 'Warehouse facilities',
            'locations'     => 'Locations & bins',
        ],
        'countries'  => [
            'world'         => 'World locations',
            'airports'      => 'Airports',
            'ocean'         => 'Ocean ports',
            'cities'        => 'Cities',
            'zip'           => 'ZIP Codes',
            'vessels'       => 'Vessels',
            'voyages'       => 'Voyages',
            'countries'     => 'Countries',
            'currencies'    => 'Currencies',
            'states'        => 'States',
            'scheduled'     => 'Schedule DK'
        ],
        'reasons'    => [
            'adjustments'   => 'Adjustments',
            'reasons'       => 'Reasons',
            'comments'      => 'Comments',
        ],
        'accounting' => [
            'billing'       => 'Billing codes',
            'banks'         => 'Banks',
            'notes'         => 'Accounting notes',
            'general'       => 'General ledger accounts',
        ],
        'drivers'    => [
            'carriers'      => 'Carriers',
            'drivers'       => 'Drivers',
            'trucks'        => 'Trucks',
            'trailers'      => 'Trailers'
        ],
        'divisions'  => [
            'divisions'     => 'Divisions',
            'department'    => 'Departments',
            'subdepartment' => 'Subdepartments',
        ],
    ],
    'rates' => [
        'warehouse' => [
            'in'            => 'In rates',
            'out'           => 'Out rates',
            'storage'       => 'Storage rates',
        ],
        'pickup'    => [
            'auto'          => 'Auto billing rates',
            'customer'      => 'Customer billing rates',
        ],
        'courier'   => [
            'customer'      => 'Customer rates',
        ],
        'air_exp'   => [
            'auto'         => 'Auto billing rates',
            'customer'     => 'Customer billing rates',
            'insurance'    => 'Insurance rates',
        ],
        'ocean_exp' => [
            'auto'         => 'Auto billing rates',
            'customer'     => 'Customer billing rates',
            'insurance'    => 'Insurance rates',
        ],
        'contract'  => [
            'ocean'        => 'Ocean contract rates',
        ],
    ],
    'warehouse' => [
        'receipts'  => [
            'entries'      => 'Receipts Entry'
        ],
        'pickup'  => [
            'orders_entries'   => 'Orders Entry'
        ]
    ],
    'export' => [
        'oceans'  => [
            'booking_entries'      => 'Booking Entry',
            'bill_of_lading'      => 'Bill of Lading',
            'shipment_entries'      => 'Shipment Entry',
            'cargo_loader'      => 'Cargo Loader',
            'step_by_step'      => 'Step by Step',
            'quotes'      => 'Quotes Entry',
        ],
        'air' => [
            'booking_entries'   => 'Booking Entry',
            'airwaybills'       => 'Airwaybills',
            'shipment_entries'  => 'Shipment Entry',
            'step_by_step'      => 'Step by Step'
        ],
    ],
    'import' => [
        'oceans'  => [

            'bill_of_lading'      => 'Bill of Lading',
            'shipment_entries'      => 'Shipment Entry',

        ]
    ]
];