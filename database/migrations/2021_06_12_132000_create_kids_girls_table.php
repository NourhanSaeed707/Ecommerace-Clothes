<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKidsGirlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kids_girls', function (Blueprint $table) {
            $table->integer('productid');
            $table->string('name');
            $table->integer('price');
            $table->integer('discount');
            $table->double('total');
            $table->integer('rate')->nullable();
            $table->integer('small');
            $table->integer('medium');
            $table->integer('large');
            $table->integer('xl');
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
        Schema::dropIfExists('kids_girls');
    }
}
