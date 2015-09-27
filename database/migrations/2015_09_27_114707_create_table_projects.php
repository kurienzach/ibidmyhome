<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('location', 100);
            $table->string('city', 50);
            $table->longText('description');

            $table->string('image_url', 100);
            $table->string('brochure_url', 100);
            $table->string('video_url', 100);
            $table->string('banner_text', 100);

            $table->integer('market_base');
            $table->integer('market_total');
            $table->integer('dev_base');
            $table->integer('dev_total');
            $table->integer('hdfc_base');
            $table->integer('hdfc_total');
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
        Schema::drop('projects');
    }
}
