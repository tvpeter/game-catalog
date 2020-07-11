<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesPlayedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_played', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->unsigned()->index();
            $table->integer('player1_id')->unsigned()->index();
            $table->unsignedInteger('player2_id')->nullable();
            $table->unsignedInteger('player3_id')->nullable();
            $table->unsignedInteger('player4_id')->nullable();
            $table->unsignedInteger('player1_score')->nullable();
            $table->unsignedInteger('player2_score')->nullable();
            $table->unsignedInteger('player3_score')->nullable();
            $table->unsignedInteger('player4_score')->nullable();
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('player1_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('player2_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('player3_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('player4_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_played');
    }
}
