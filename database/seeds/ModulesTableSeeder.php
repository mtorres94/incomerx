<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modules')->delete();
        
        \DB::table('modules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_en' => 'maintenance',
                'name_es' => 'mantenimiento',
                'icon' => 'fa fa-cogs',
            ),
        ));
        
        
    }
}
