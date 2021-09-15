<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->integer('productid');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('phone');
            $table->string('nameoncard');
            $table->integer('cardnumber');
            $table->date('datee');
            $table->string('postalcode');
            $table->integer('securitycode');
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
        Schema::dropIfExists('checkout');
    }
}
