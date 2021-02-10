<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('customerName',100);
            $table->string('phoneNo',100);
            $table->string('address',100);
            $table->integer('sexid');
            $table->foreign('sexid')->references('id')->on('sex');
            $table->string('dob');
            $table->string('address');
            $table->string('postcode');
            $table->string('username');
            $table->string('password');
            $table->integer('cartid');
            $table->foreign('cartid')->references('id')->on('cart');
            $table->integer('orderid');
            $table->foreign('orderid')->references('id')->on('order');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
