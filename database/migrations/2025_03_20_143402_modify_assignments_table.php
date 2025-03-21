<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('assignments', function (Blueprint $table) {
            // Remove file_name column
            $table->dropColumn('file_name');

            // Add questions column
            $table->text('questions')->after('deadline');
        });
    }

    public function down() {
        Schema::table('assignments', function (Blueprint $table) {
            // Add file_name back (if rollback is needed)
            $table->string('file_name', 255)->nullable()->after('deadline');

            // Remove questions column
            $table->dropColumn('questions');
        });
    }
};
