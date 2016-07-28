<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('spendings', function (Blueprint $table) {
            $table->increments('spend_id');
            $table->date("created_at");
            $table->integer("created_by")->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('group_id')->on('groups');
            $table->float("total_amount");
            $table->longText("description");
            $table->char('short_description', 50);
            $table->boolean("canceled");
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
        Schema::dropIfExists('spendings');
    }
}
