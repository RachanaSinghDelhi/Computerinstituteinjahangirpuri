<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('deadline');
            $table->string('file_name')->nullable(); // Store only the file name
            
            // Match the student_id type in the students table
            $table->bigInteger('student_id')->nullable(); 

            // Reference the users table for teacher roles
            $table->unsignedBigInteger('added_by'); // Teacher who added
            $table->unsignedBigInteger('updated_by')->nullable(); // Teacher who updated
            
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('assignments');
    }
};
