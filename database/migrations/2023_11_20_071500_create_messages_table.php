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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversationID');
            $table->foreign('conversationID')->references('id')->on('conversations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('from');
            $table->foreign('from')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('to');
            $table->foreign('to')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('text');
            $table->dateTime('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
