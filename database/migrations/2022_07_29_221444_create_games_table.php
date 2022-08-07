<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_team_id')->constrained('teams');
            $table->foreignId('second_team_id')->constrained('teams');

            $table->integer('first_team_score')->nullable();
            $table->integer('second_team_score')->nullable();
            $table->integer('first_team_hits')->nullable();
            $table->integer('second_team_hits')->nullable();
            $table->integer('first_team_errors')->nullable();
            $table->integer('second_team_errors')->nullable();
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
        Schema::dropIfExists('games');
    }
};
