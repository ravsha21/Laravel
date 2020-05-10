<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            //$table->decimal("total_price", 6, 2);
            $table->string("first_name", 255)->nullable();
            $table->string("last_name", 255)->nullable();
            $table->string("phone_number", 255)->nullable();
            $table->text("address")->nullable();
            $table->string("city", 255)->nullable();
            $table->string("state", 255)->nullable();
            $table->string("country", 255)->nullable();
            $table->string("zip_code", 255)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
