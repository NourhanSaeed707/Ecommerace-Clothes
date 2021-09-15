<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint:

class CreateSunglassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sunglasses', function (Blueprint $table) {
            $table->integer('productid');
            $table->string('name');
            $table->integer('price');
            $table->integer('discount');
            $table->double('total');
            $table->integer('rate')->nullable();
            $table->integer('bestseller')->nullable();
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
        Schema::dropIfExists('sunglasses');
    }
}
