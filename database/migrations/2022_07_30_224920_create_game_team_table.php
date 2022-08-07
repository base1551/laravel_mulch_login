<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_team', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id')->comment('試合ID');
            $table->foreign('game_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('team_id')->comment('チームID');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->boolean('first_attack_flg');
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
        Schema::dropIfExists('game_team');
    }
}
