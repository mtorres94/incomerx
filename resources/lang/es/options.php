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
            'types'         => 'Tipos de clientes',
            'business'      => 'Tipos de negocios',
            'sales_rep'     => 'Representantes de ventas',
            'contact'       => 'Tipos de contactos',
            'id'            => 'Tipos de identificaciones',
            'payment'       => 'Términos de pago',
            'incoterm'      => 'Incoterms',
            'customers'     => 'Clientes',
        ],
        'vendors'    => [
            'types'         => 'Tipos de vendedores',
            'suppliers'     => 'Proveedores',
            'vendors'       => 'Vendedores'
        ],
        'items'      => [
            'units'         => 'Unidades',
            'equipment'     => 'Tipos de equipos',
            'commodities'   => 'Características',
            'services'      => 'Servicios',
            'shipment'      => 'Tipos de envío',
            'category'      => 'Categoría de artículos',
            'subcategory'   => 'Subcategoría de artículos',
            'items'         => 'Artículos',
        ],
        'warehouse'  => [
            'cargo'         => 'Tipos de carga',
            'irregular'     => 'Irregularidades de carga',
            'facilities'    => 'Instalaciones de almacenamiento',
            'locations'     => 'Ubicaciones y contenedores',
        ],
        'countries'  => [
            'world'         => 'Ubicaciones mundiales',
            'airports'      => 'Aeropuertos',
            'ocean'         => 'Puertos marítimos',
            'cities'        => 'Ciudades',
            'zip'           => 'Códigos postales',
            'vessels'       => 'Buques',
            'voyages'       => 'Vuelos',
            'countries'     => 'Paises',
            'currencies'    => 'Monedas',
            'states'        => 'Estados',
            'scheduled'     => 'Horarios DK',
        ],
        'reasons'    => [
            'adjustments'   => 'Ajustes',
            'reasons'       => 'Razones',
            'comments'      => 'Comentarios',
        ],
        'users'      => [

        ],
        'accounting' => [
            'billing'       => 'Códigos de facturación',
            'banks'         => 'Bancos',
            'notes'         => 'Notas contables',
            'general'       => 'Cuentas de libro mayor',
        ],
        'drivers'    => [
            'carriers'      => 'Transportistas',
            'drivers'       => 'Conductores',
            'trucks'        => 'Camiones',
            'trailers'      => 'Remolques'
        ],
        'divisions'  => [
            'divisions'     => 'Divisiones',
            'department'    => 'Departamentos',
            'subdepartment' => 'Subdepartamentos',
        ],
    ],
    'rates' => [
        'warehouse' => [
            'in'            => 'Tarifas de entrada',
            'out'           => 'Tarifas de salida',
            'storage'       => 'Tarifas de almacenaje',
        ],
        'pickup'    => [
            'auto'          => 'Tarifas de facturación automática',
            'customer'      => 'Tarifas de facturación a clientes',
        ],
        'courier'   => [
            'customer'      => 'Tarifas de clientes',
        ],
        'air_exp'   => [
            'auto'         => 'Tarifas de facturación automática',
            'customer'     => 'Tarifas de facturación a clientes',
            'insurance'    => 'Tarifas de segiro',
        ],
        'ocean_exp' => [
            'auto'         => 'Tarifas de facturación automática',
            'customer'     => 'Tarifas de facturación a clientes',
            'insurance'    => 'Tarifas de segiro',
        ],
        'contract'  => [
            'ocean'        => 'Tarifas de contratos marítimos',
        ],
    ],
    'warehouse' => [
        'receipts' => [
            'entries' => 'Registro de entradas',
        ],
    ],
];