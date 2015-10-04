<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjectunits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_units', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');

            $table->string('unit_type', 20);
            $table->mediumInteger('area');

            $table->integer('other_charges');
            $table->integer('govt_charges');

            $table->integer('min_bid_value');

            $table->string('highest_bid');

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
        Schema::drop('project_units');
    }
}
