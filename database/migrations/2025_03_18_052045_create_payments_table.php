<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary Key (Auto Increment)
            $table->unsignedBigInteger('user_id'); // User ID who made the payment
            $table->unsignedBigInteger('student_id'); // Links payment to a student
            $table->string('method'); // Payment method (UPI, QR Code, Bank Transfer)
            $table->string('transaction_id')->unique(); // Unique Transaction ID
            $table->decimal('amount', 10, 2); // Payment amount
            $table->enum('status', ['pending', 'approved'])->default('pending'); // Approval status
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
