<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBidIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('bid_id')->unsigned()->nullable();
            $table->foreign('bid_id')
                  ->references('id')->on('bids');

            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')
                  ->references('id')->on('projects');

            $table->integer('payment_id')->unsigned()->nullable();
            $table->foreign('payment_id')
                  ->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_bid_id_foreign');
            $table->dropColumn('bid_id');
            $table->dropForeign('users_project_id_foreign');
            $table->dropColumn('project_id');
            $table->dropForeign('users_payment_id_foreign');
            $table->dropColumn('payment_id');
        });
    }
}
