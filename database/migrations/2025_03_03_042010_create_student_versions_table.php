<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->json('old_data'); // Store previous values
            $table->json('new_data'); // Store new values
            $table->unsignedBigInteger('updated_by'); // Track who updated
            $table->timestamps();
    
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('student_versions');
    }
    
};
