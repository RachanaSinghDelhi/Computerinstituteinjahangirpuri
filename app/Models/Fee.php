<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'course_id', 'payment_date', 'amount_paid',
        'receipt_number', 'receipt_image', 'status',
    ];

    // Get installment amount
    public function getInstallmentAmountAttribute()
    {
        $course = $this->course;
        if ($course) {
            return $course->total_fee / $course->installments; // Total fee divided by installments
        }
        return 0;
    }

    // Get fees due
    public function getFeesDueAttribute()
    {
        $course = $this->course;
        $totalPaid = $this->where('student_id', $this->student_id)->sum('amount_paid');
        return $course ? $course->total_fees - $totalPaid : 0; // Total fee minus total paid
    }

    // Calculate due date (end of the current month if pending payment)
    public function getDueDateAttribute()
    {
        $student = $this->student;  // Access the related student

        // Check if the student exists and has an admission date
        if ($student && $student->doa) {
            // Parse the admission date as a Carbon instance
            $admissionDate = Carbon::parse($student->doa);

            // Calculate the number of months since admission
            $monthsSinceAdmission = now()->diffInMonths($admissionDate);

            // Add months and calculate the due date
            return $admissionDate->addMonths($monthsSinceAdmission + 1)->endOfMonth();
        }

        return null; // Return null if no admission date
    }

    // Determine fee status
    public function getFeeStatusAttribute()
    {
        return $this->fees_due > 0 ? 'Pending' : 'Paid';
    }

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
