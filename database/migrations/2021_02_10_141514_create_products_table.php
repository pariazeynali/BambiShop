<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->string('company');
            $table->integer('price');
            $table->integer('count');
            $table->unsignedBigInteger('kind_id');
            $table->foreign('kind_id')->references('id')->on('kind');
            $table->integer('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('type');
            $table->integer('skintypeid')->nullable();
            $table->foreign('skintypeid')->references('id')->on('skintype');
            $table->binary('pic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
