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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignID('shelterID');
            $table->foreign('shelterID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('animalType');
            $table->string('age');
            $table->string('breed');
            $table->string('color');
            $table->string('description');
            $table->string('gender');
            $table->string('image');
            $table->string('name');
            $table->string('size');
            $table->boolean('isAdopted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
