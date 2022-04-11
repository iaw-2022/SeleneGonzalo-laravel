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
        Schema::create('qualifies', function (Blueprint $table) {
            $table->string('user_email');
            $table->bigInteger('id_recipe');
            $table->string('commentary');
            $table->string('qualification');
            $table->foreign('user_email')->references('email')->on('users');
            $table->foreign('id_recipe')->references('id')->on('recipes');
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
        Schema::dropIfExists('qualifies');
    }
};