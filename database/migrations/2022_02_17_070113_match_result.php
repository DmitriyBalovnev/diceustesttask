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
        Schema::create('match_results', function (Blueprint $table) {
            $table->id('matchid')->autoIncrement();
            $table->string('teamname1')->default("team_name");
            $table->string('teamname2')->default("team_name");
            $table->integer('goal1')->default(0);
            $table->integer('goal2')->default(0);
            $table->integer('week')->default(0);
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
        Schema::dropIfExists('match_results');
    }
};
