<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddcartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addcarts', function (Blueprint $table) {
            $table->increments('id');
             $table->string('product');
            $table->string('size');
            $table->string('color');
            $table->string('label');
            $table->string('sale_quantity');
            $table->string('unit_prices');
            $table->longtext('barcode');
            $table->string('warehouse');
            $table->integer('cabin');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('addcarts');
    }
}
