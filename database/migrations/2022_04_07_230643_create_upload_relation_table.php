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
        Schema::create('upload', function (Blueprint $table) {
            $table->bigInteger('id_ingredient');
            $table->bigInteger('id_recipe');
            $table->string('user_email');
            $table->foreign('id_ingredient')->references('id')->on('ingredients');
            $table->foreign('id_recipe')->references('id')->on('recipes');
            $table->foreign('user_email')->references('email')->on('users');
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
        Schema::dropIfExists('upload');
    }
};