<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('students', function (Blueprint $table) {
        $table->unsignedBigInteger('course_id')->nullable(); // Add course_id as an unsigned big integer
        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade'); // Add foreign key constraint
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropForeign(['course_id']); // Drop the foreign key constraint
        $table->dropColumn('course_id'); // Drop the column
    });
}

};
