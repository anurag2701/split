<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpendingsBreakups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('spending_breakups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("spend_id")->unsigned();
            $table->foreign('spend_id')->references('spend_id')->on('spendings');
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->float("amount");
            $table->boolean("is_paid");
            $table->dateTime('paid_at');
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
        Schema::dropIfExists('spending_breakups');
    }
}
