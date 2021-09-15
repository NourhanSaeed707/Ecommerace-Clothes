<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableShoppingCartVisitor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_visitor', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->text('image');
            $table->integer('quantity');
            $table->text('color');
            $table->string('size');
            $table->double('price');
            $table->double('total');
            $table->string('tablename');
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
        Schema::dropIfExists('table__shopping_cart_visitor');
    }
}
