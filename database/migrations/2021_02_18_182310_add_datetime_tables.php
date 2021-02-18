<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatetimeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamps()->nullable();
        });
        Schema::table('kind', function (Blueprint $table) {
            $table->timestamps()->nullable();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->timestamps()->nullable();
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->timestamps()->nullable();
        });
        Schema::table('skintype', function (Blueprint $table) {
            $table->timestamps()->nullable();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->timestamps()->nullable();
        });
        Schema::table('type', function (Blueprint $table) {
            $table->timestamps()->nullable();
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
