<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 15);
            $table->string('name', 45);
            $table->integer('packages');
            $table->text('additional_description');

            $table->integer('customer_id')->unsigned();
            $table->decimal('net_value', 8, 2);
            $table->decimal('gross_value', 8, 2);

            $table->integer('category_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();

            $table->string('vendor_sku_number', 20);

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
        Schema::drop('items');
    }
}
