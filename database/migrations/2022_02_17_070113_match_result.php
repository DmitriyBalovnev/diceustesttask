<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MatchResults', function (Blueprint $table) {
            $table->id('matchid')->autoIncrement();
            $table->string('team1')->default("team_name");
            $table->string('team2')->default("team_name");
            $table->integer('goals1')->default(0);
            $table->integer('goals2')->default(0);
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
        Schema::dropIfExists('MatchResults');

    }
};
