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

            $table->string('market_base', 50);
            $table->string('market_total', 50);
            $table->string('dev_base', 50);
            $table->string('dev_total', 50);
            $table->string('hdfc_base', 50);
            $table->string('hdfc_total', 50);
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
