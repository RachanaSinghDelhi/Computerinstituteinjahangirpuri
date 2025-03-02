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
        Schema::table('students', function (Blueprint $table) {
            $table->string('added_by')->default('super_admin')->change();
        });

        // Update existing NULL values
        DB::table('students')->whereNull('added_by')->update(['added_by' => 'super_admin']);
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('added_by')->nullable()->change();
        });
    }
};
