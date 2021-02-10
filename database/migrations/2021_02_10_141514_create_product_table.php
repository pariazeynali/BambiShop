<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->string('company');
            $table->integer('price');
            $table->integer('count');
            $table->integer('kindid');
            $table->foreign('kindid')->references('id')->on('kind');
            $table->integer('typeid');
            $table->foreign('typeid')->references('id')->on('type');
            $table->integer('skintypeid');
            $table->foreign('skintypeid')->references('id')->on('skintype');
            $table->binary('pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
