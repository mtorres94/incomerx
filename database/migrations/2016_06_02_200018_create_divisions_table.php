<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 45);
            $table->text('address');
            $table->string('city', 30);
            $table->integer('state_id')->unsigned();
            $table->string('zip', 10);
            $table->string('phone', 15);
            $table->string('fax', 15);
            $table->integer('log_counter')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->text('comments');

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
        Schema::drop('divisions');
    }
}
