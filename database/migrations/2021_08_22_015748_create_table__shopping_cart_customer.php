<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableShoppingCartCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_customer', function (Blueprint $table) {
            $table->id();
            $table->integer('customerid');
            $table->foreign('customerid')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->text('image');
            $table->integer('quantity');
            $table->text('color');
            $table->string('size');
            $table->integer('price');
            $table->double('total');
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
        Schema::dropIfExists('table__shopping_cart_customer');
    }
}
