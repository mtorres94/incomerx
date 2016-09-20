<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
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
            $table->string('duns_code', 10);
            $table->integer('incoterm_id')->unsigned();
            $table->date('since');
            $table->string('dps_check', 10);
            $table->integer('status');

            $table->boolean('shipper');
            $table->boolean('consignee');
            $table->boolean('third_party');
            $table->boolean('agent');

            $table->integer('currency_id')->unsigned();
            $table->integer('agent_id')->unisgned();
            $table->integer('coloader_id')->unsigned();
            $table->integer('origin_id')->unsigned();
            $table->integer('destination_id')->unsigned();

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
        Schema::drop('customers');
    }
}
