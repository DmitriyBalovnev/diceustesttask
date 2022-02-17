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
        Schema::create('LeagueTable', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->default("team_name");
            $table->integer('pts')->default(0);
            $table->integer('p')->default(0);
            $table->integer('w')->default(0);
            $table->integer('d')->default(0);
            $table->integer('l')->default(0);
            $table->integer('gd')->default(0);
            $table->integer('gamesid')->default(0);
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
        Schema::dropIfExists('LeagueTable');
    }
};
