<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('unit_id')->unsigned();
            $table->integer('bid_value');
            $table->integer('total_price');

            $table->foreign('unit_id')
                  ->references('id')->on('project_units');

            $table->tinyInteger('higher_floor')->default(0);
            $table->tinyInteger('premium_view')->default(0);

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
        Schema::drop('bids');
    }
}
