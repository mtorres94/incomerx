<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 45);
            $table->string('latitude', 15);
            $table->string('longitude', 15);
            $table->integer('scheduled_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('city', 30);
            $table->integer('state_id')->unsigned();

            $table->boolean('ocean_port');
            $table->boolean('airport');
            $table->boolean('inland_port');
            $table->boolean('border_crossing');
            $table->boolean('rail_terminal');
            $table->boolean('road_terminal');
            $table->boolean('multimodal');
            $table->boolean('fix_transportation');
            $table->boolean('post_office');
            $table->boolean('city_');
            $table->boolean('place');

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
        Schema::drop('world_locations');
    }
}
