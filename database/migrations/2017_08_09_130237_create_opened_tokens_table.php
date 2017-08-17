<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenedTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opened_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tracker_id')->unsigned(); //
            $table->string('browser');
            $table->string('os');
            $table->string('device');
            $table->string('user_ip'); //
            $table->string('user_agent'); //
            $table->timestamps('created_at'); //
        });

        Schema::table('opened_tokens', function (Blueprint $table){
            $table->foreign('tracker_id')->references('id')->on('sent_tokens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opened_tokens');
    }
}
