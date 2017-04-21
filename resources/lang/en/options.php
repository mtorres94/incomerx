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
            'carriers'      => 'Carriers',
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
            'billing_codes'       => 'Billing codes',
            'banks'         => 'Banks',
            'notes'         => 'Accounting notes',
            'general'       => 'General ledger accounts',
        ],
        'drivers'    => [

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
        ],
        'report' => [
            'cargo' => 'Cargo Report'
        ]
    ],
    'export' => [
        'oceans'  => [
            'booking_entries'      => 'Booking Entry',
            'quotes'      => 'Quotes Entry',
            'shipment_entries'      => 'Shipment Entry',
            'cargo_loader'      => 'Loading Guide',
            'step_by_step'      => 'Step by Step',
            'bill_of_lading'      => 'Bill of Lading',
            'manifest'      => 'Ocean Manifest'
        ],
        'air' => [
            'booking_entries'   => 'Booking Entry',
            'airwaybills'       => 'Airwaybills',
            'loading_guides'  => 'Loading Guides',


        ],
    ],
    'import' => [
        'oceans'  => [
            'bill_of_lading'      => 'Bill of Lading',
            'routing_order'      => 'Routing Order',
            'quotes'      => 'Quotes',
        ],
         'air'  => [
            'bill_of_lading'      => 'Airwaybill',
            'routing_order'      => 'Routing Order',
            'quotes'      => 'Quotes',
        ]
    ],
    'accounting_bridge' =>[
        'invoice_notes' =>[
            'invoices' => 'Invoices and Credit Entry',
            'export_invoices' => 'Export Posted Invoices to QuickBooks',
            'invoice_reports' => 'Invoices Reports',
        ],
    ]
];