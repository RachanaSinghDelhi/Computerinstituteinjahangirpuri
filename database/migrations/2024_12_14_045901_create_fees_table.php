<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Foreign key for student
            $table->unsignedBigInteger('course_id'); // Foreign key for course
            $table->date('payment_date');           // Date of payment
            $table->decimal('amount_paid', 10, 2); // Amount paid
            $table->string('receipt_number');      // Receipt number
            $table->string('receipt_image');       // Path to uploaded receipt image
            $table->enum('status', ['Paid', 'Unpaid'])->default('Paid'); // Payment status
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
