<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('assignments', function (Blueprint $table) {
            // Add status column with default value as 'pending'
            $table->enum('status', ['pending', 'completed', 'overdue'])->default('pending')->after('course_id');
        });
    }

    public function down() {
        Schema::table('assignments', function (Blueprint $table) {
            // Drop status column in case of rollback
            $table->dropColumn('status');
        });
    }
};
