<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                'username' => 'admin',
                'name' => 'administrador',
                'email' => 'mtorres@sassblum.com',
                'password' => bcrypt('admin2016'),
                'role' => 'admin',
                'status' => 'active'
            )
        );
    }
}
