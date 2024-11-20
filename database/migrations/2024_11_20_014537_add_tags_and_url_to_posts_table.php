<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('tags')->nullable(); // For tags
            $table->string('url')->nullable();  // For URL
        });
    }
    
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('tags');
            $table->dropColumn('url');
        });
    }
    
};
