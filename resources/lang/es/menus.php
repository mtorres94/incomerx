<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Modules Options
    |--------------------------------------------------------------------------
    |
    */

    'maintenance' => [
        'customers'  => 'Clientes',
        'vendors'    => 'Vendedores y proveedores',
        'items'      => 'Artículos y unidades',
        'warehouse'  => 'Bodega y ubicaciones',
        'countries'  => 'Paises y destinos',
        'reasons'    => 'Razones y comentarios',
        'users'      => 'Usuarios',
        'accounting' => 'Codigos contables',
        'drivers'    => 'Conductores y trasnportistas',
        'divisions'  => 'Divisiones y departamentos',
    ],
    'rates' => [
        'warehouse' => 'Tarifas de bodega',
        'pickup'    => 'Tarifas de recogida y entrega',
        'courier'   => 'Tarifas  de mensajería',
        'air_exp'   => 'Tarifas de exportación aérea',
        'ocean_exp' => 'Tarifas de exportación marítima',
        'contract'  => 'Tarifas de contratos',
    ],
    'warehouse' => [
        'pickup' => '',
        'receipts'  => 'Registros',
    ],
    'export' => [
        'oceans'  => 'Exportación marítima',
    ],
];