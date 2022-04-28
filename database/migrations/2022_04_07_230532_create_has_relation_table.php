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
        Schema::create('has', function (Blueprint $table) {
            $table->string('lot');
            $table->bigInteger('id_ingredient');
            $table->bigInteger('id_recipe');
            $table->foreign('id_ingredient')->references('id')->on('ingredients')->onDelete('cascade');
            $table->foreign('id_recipe')->references('id')->on('recipes')->onDelete('cascade');
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
        Schema::dropIfExists('has');
    }
};