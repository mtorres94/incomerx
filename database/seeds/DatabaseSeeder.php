<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call('ModulesTableSeeder');
        $this->call('MenusTableSeeder');
        $this->call('OptionsTableSeeder');
        $this->call('MstModulesTableSeeder');
        $this->call('MstCustomersTableSeeder');
        $this->call('MstMenusTableSeeder');
        $this->call('MstOptionsTableSeeder');
    }
}
