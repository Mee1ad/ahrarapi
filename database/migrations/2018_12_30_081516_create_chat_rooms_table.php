<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user1Id');
            $table->unsignedInteger('user2Id');
            $table->timestamps();
        });
        Schema::table('chat_rooms', function(Blueprint $table) {
            $table->foreign('user1Id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user2Id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_rooms');
    }
}
