<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 45);
            $table->text('address');
            $table->string('city', 30);
            $table->integer('state_id')->unsigned();
            $table->string('zip', 10);
            $table->integer('country_id')->unsigned();

            $table->string('contact_name', 45);
            $table->string('contact_phone', 15);
            $table->string('contact_fax', 15);
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
        Schema::drop('suppliers');
    }
}
