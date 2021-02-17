<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fname');
            $table->string('lname');
            $table->string('national_id',10)->unique();
            $table->string('phone_number',11)->unique();
            $table->string('province');
            $table->string('city');
            $table->string('postcode',10)->unique();
            $table->longText('address');







        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
