<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_en' => 'customers',
                'name_es' => 'clientes',
                'icon' => 'fa fa-users',
                'module_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name_en' => 'vendors, carriers & suppliers',
                'name_es' => '',
                'icon' => 'fa fa-users',
                'module_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name_en' => 'units & equipments',
                'name_es' => 'unidades y equipos',
                'icon' => 'fa ion-cube',
                'module_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name_en' => 'warehouse & locations',
                'name_es' => 'almacen y ubicaciones',
                'icon' => 'fa fa-building',
                'module_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name_en' => 'origin & destinations',
                'name_es' => 'origen y destinos',
                'icon' => 'fa ion-earth',
                'module_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name_en' => 'vessels & voyages',
                'name_es' => 'buques y viajes',
                'icon' => 'fa fa-ship',
                'module_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name_en' => 'adjustments, reasons & comment',
                'name_es' => 'ajustes, razones y comentarios',
                'icon' => 'fa ion-hammer',
                'module_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name_en' => 'users',
                'name_es' => 'usuarios',
                'icon' => 'fa ion-person-stalker',
                'module_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name_en' => 'accounting codes',
                'name_es' => 'codigos contables',
                'icon' => 'fa fa-bar-chart',
                'module_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name_en' => 'drivers, trucks & trailers',
                'name_es' => 'conductores, camiones y traile',
                'icon' => 'fa fa-bus',
                'module_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name_en' => 'countries & currencies',
                'name_es' => 'paises y monedas',
                'icon' => 'fa ion-earth',
                'module_id' => 1,
            ),
        ));
        
        
    }
}
