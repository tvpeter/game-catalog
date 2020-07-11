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
        Schema::create('games_users', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->unsigned()->index();
            $table->integer('user1_id')->unsigned()->index();
            $table->unsignedInteger('user2_id')->nullable();
            $table->unsignedInteger('user3_id')->nullable();
            $table->unsignedInteger('user4_id')->nullable();
            $table->unsignedInteger('user1_score')->nullable();
            $table->unsignedInteger('user2_score')->nullable();
            $table->unsignedInteger('user3_score')->nullable();
            $table->unsignedInteger('user4_score')->nullable();
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('user1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user2_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user3_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user4_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_users');
    }
}
