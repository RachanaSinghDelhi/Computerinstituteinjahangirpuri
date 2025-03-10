<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddUsernameToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('email'); // Allow NULL temporarily
        });

        // Update existing users with unique usernames
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $username = 'nice' . rand(100, 999) . $user->student_id;
            while (DB::table('users')->where('username', $username)->exists()) {
                $username = 'nice' . rand(100, 999) . $user->student_id;
            }
            DB::table('users')->where('id', $user->id)->update(['username' => $username]);
        }

        // Now enforce uniqueness
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
}
 