<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('student_id')->unique()->after('id'); // Student ID
            $table->string('name')->after('student_id'); // Student Name
            $table->string('father_name')->after('name'); // Father's Name
            $table->date('doa')->after('father_name'); // Date of Admission
            $table->string('course')->after('doa'); // Course Name
            $table->string('batch')->after('course'); // Batch Timing
            $table->string('photo')->nullable()->after('batch'); // Photo Path
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['student_id', 'name', 'father_name', 'doa', 'course', 'batch', 'photo']);
        });
    }
}
