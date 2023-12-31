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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('category');
            $table->timestamps();
        });
    
        Schema::create('quiz_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->string('text');
            $table->boolean('isCorrect');
            $table->timestamps();
    
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('quiz_options');
        Schema::dropIfExists('quizzes');
    }
};