<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chatRoomId');
            $table->boolean('admin')->default(0);
            $table->boolean('seen')->default(0);
            $table->text('text');
            $table->timestamps();
        });
        Schema::table('chats', function(Blueprint $table) {
            $table->foreign('chatRoomId')->references('id')->on('chat_rooms')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
