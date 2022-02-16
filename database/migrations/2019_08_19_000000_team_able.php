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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->name('team_name');
            $table->text('pts');
            $table->text('p');
            $table->text('w');
            $table->text('d');
            $table->text('l');
            $table->text('gd');
            $table->timestamps();
        });

        Schema::create('4weekmatchresult', function (Blueprint $table) {
            $table->id();
            $table->name('?');
            $table->text('pts');
            $table->text('p');
            $table->text('w');
            $table->text('d');
            $table->text('l');
            $table->text('gd');
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
        Schema::dropIfExists('failed_jobs');
    }
};
