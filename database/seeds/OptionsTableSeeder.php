<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('options')->delete();
        
        DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_en' => 'customer types',
                'name_es' => 'tipos de cliente',
                'route' => 'maintenance.customers.customer_types.index',
                'icon' => 'fa ion-wrench',
                'menu_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name_en' => 'business types',
                'name_es' => 'tipos de negocio',
                'route' => 'maintenance.customers.business_types.index',
                'icon' => 'fa ion-wrench',
                'menu_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name_en' => 'sales representatives',
                'name_es' => 'representantes de ventas',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name_en' => 'vendors types',
                'name_es' => 'tipos de vendedores',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'name_en' => 'carriers',
                'name_es' => 'transportistas',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'name_en' => 'suppliers',
                'name_es' => 'proveedores',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'name_en' => 'units',
                'name_es' => 'unidades',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'name_en' => 'cargo types',
                'name_es' => 'tipos de carga',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 3,
            ),
            8 => 
            array (
                'id' => 9,
                'name_en' => 'cargo irregularities',
                'name_es' => 'irregularidades de carga',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 3,
            ),
            9 => 
            array (
                'id' => 10,
                'name_en' => 'equipment types',
                'name_es' => 'tipos de equipos',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 3,
            ),
            10 => 
            array (
                'id' => 11,
                'name_en' => 'commodities',
                'name_es' => 'materias primas',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 3,
            ),
            11 => 
            array (
                'id' => 12,
                'name_en' => 'services',
                'name_es' => 'servicios',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 3,
            ),
            12 => 
            array (
                'id' => 13,
                'name_en' => 'shipment types',
                'name_es' => 'tipos de envio',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 3,
            ),
            13 => 
            array (
                'id' => 14,
                'name_en' => 'warehouse facilities',
                'name_es' => 'instalaciones de almacenamient',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 4,
            ),
            14 => 
            array (
                'id' => 15,
                'name_en' => 'locations & bins',
                'name_es' => 'ubicaciones y contenedores',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 4,
            ),
            15 => 
            array (
                'id' => 16,
                'name_en' => 'world locations',
                'name_es' => 'ubicaciones mundiales',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 5,
            ),
            16 => 
            array (
                'id' => 17,
                'name_en' => 'airports',
                'name_es' => 'aeropuertos',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 5,
            ),
            17 => 
            array (
                'id' => 18,
                'name_en' => 'ocean ports',
                'name_es' => 'puertos maritimos',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 5,
            ),
            18 => 
            array (
                'id' => 19,
                'name_en' => 'cities',
                'name_es' => 'ciudades',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 5,
            ),
            19 => 
            array (
                'id' => 20,
                'name_en' => 'zip codes',
                'name_es' => 'codigos postales',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 5,
            ),
            20 => 
            array (
                'id' => 21,
                'name_en' => 'vessels',
                'name_es' => 'buques',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 6,
            ),
            21 => 
            array (
                'id' => 22,
                'name_en' => 'voyages',
                'name_es' => 'viajes',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 6,
            ),
            22 => 
            array (
                'id' => 23,
                'name_en' => 'adjustments',
                'name_es' => 'ajustes',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 7,
            ),
            23 => 
            array (
                'id' => 24,
                'name_en' => 'reasons',
                'name_es' => 'razones',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 7,
            ),
            24 => 
            array (
                'id' => 25,
                'name_en' => 'comments',
                'name_es' => 'comentarios',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 7,
            ),
            25 => 
            array (
                'id' => 26,
                'name_en' => 'billing codes',
                'name_es' => 'codigos de facturacion',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 9,
            ),
            26 => 
            array (
                'id' => 27,
                'name_en' => 'banks',
                'name_es' => 'bancos',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 9,
            ),
            27 => 
            array (
                'id' => 28,
                'name_en' => 'drivers',
                'name_es' => 'conductores',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 10,
            ),
            28 => 
            array (
                'id' => 29,
                'name_en' => 'trucks',
                'name_es' => 'camiones',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 10,
            ),
            29 => 
            array (
                'id' => 30,
                'name_en' => 'trailers',
                'name_es' => 'trailers',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 10,
            ),
            30 => 
            array (
                'id' => 31,
                'name_en' => 'countries',
                'name_es' => 'paises',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 11,
            ),
            31 => 
            array (
                'id' => 32,
                'name_en' => 'currencies',
                'name_es' => 'monedas',
                'route' => '',
                'icon' => 'fa ion-wrench',
                'menu_id' => 11,
            ),
        ));
    }
}
