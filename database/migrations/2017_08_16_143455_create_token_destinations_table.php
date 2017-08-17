<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_destinations', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('dest');
        });

        Schema::table('token_destinations', function (Blueprint $table){
            $table->foreign('id')->references('id')->on('sent_tokens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token_destinations');
    }
}
