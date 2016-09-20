<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 45);
            $table->text('address');
            $table->string('city', 30);
            $table->integer('state_id')->unsigned();
            $table->integer('zip_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('phone', 15);
            $table->string('fax', 15);
            $table->string('mobile', 15);
            $table->date('since');
            $table->integer('currency_id')->unsigned();

            $table->boolean('airline');
            $table->boolean('ocean_carrier');
            $table->boolean('truck');
            $table->boolean('agent');
            $table->boolean('other');

            $table->integer('status');

            $table->string('contact_name', 45);
            $table->string('email_contact', 60);

            $table->integer('user_create_id')->unsigned();
            $table->integer('user_update_id')->unsigned();

            $table->foreign('user_create_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('user_update_id')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vendors');
    }
}
