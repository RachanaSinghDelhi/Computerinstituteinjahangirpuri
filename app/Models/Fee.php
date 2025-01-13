<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'course_id', 'payment_date','due_date', 'amount_paid',
        'receipt_number', 'receipt_image', 'status',
    ];


    protected $casts = [
        'payment_date' => 'date',
        'due_date' => 'date',
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
   
    // Determine fee status
    public function getFeeStatusAttribute()
    {
        return $this->fees_due > 0 ? 'Pending' : 'Paid';
    }

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id'); // Adjust 'student_id' if necessary
    }
    

   

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id'); // Adjust 'course_id' as per your schema
    }
}
