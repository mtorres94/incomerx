<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncotermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoterms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 3);
            $table->string('name', 45);
            $table->text('description');

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
        Schema::drop('incoterms');
    }
}
