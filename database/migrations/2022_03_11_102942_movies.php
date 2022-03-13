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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('movie_id');
            $table->string('title');
            $table->text('overview');
            $table->string('popularity');
            $table->string('release_date');
            $table->string('vote_average');
            $table->string('budget');
            $table->string('backdrop_path');
            $table->string('poster_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
