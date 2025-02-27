<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id(); // Primary Key (Auto-increment)
            $table->year('year');
            $table->unsignedBigInteger('grade_id');
            $table->char('section', 2);
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
};
