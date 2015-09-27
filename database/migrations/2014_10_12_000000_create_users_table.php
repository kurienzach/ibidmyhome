<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);

            $table->string('mobile', 12);
            $table->string('address', 200);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('country', 50);
            $table->string('pincode', 10);
            $table->string('relmanager', 50);
            $table->string('heard_source', 50);
            $table->string('coapplicant', 80);

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
