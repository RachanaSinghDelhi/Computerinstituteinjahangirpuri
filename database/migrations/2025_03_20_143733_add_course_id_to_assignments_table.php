
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('assignments', function (Blueprint $table) {
            // Add course_id column with a foreign key reference
            $table->unsignedBigInteger('course_id')->after('student_id');

            // Define the foreign key constraint for course_id
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::table('assignments', function (Blueprint $table) {
            // Drop the foreign key and course_id column in case of rollback
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });
    }
};
