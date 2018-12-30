<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('teacherId');
            $table->unsignedInteger('courseId');
            $table->string('classNumber')->nullable();
            $table->string('time')->nullable();
            $table->timestamps();
        });
        Schema::table('my_classes', function(Blueprint $table) {
            $table->foreign('teacherId')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('courseId')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_classes');
    }
}
