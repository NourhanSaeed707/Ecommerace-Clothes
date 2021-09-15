<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes', function (Blueprint $table) {
            $table->integer('productid');
            $table->string('name');
            $table->integer('price');
            $table->integer('discount');
            $table->double('total');
            $table->integer('rate')->nullable();
            $table->integer('size_37');
            $table->integer('size_38');
            $table->integer('size_39');
            $table->integer('size_40');
            $table->integer('bestseller')->nullable();
            $table->text('color');
            $table->text('image');
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
        Schema::dropIfExists('shoes');
    }
}
