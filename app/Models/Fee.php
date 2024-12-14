<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'payment_date',
        'amount_paid',
        'receipt_number',
        'receipt_image',
        'status',
    ];

    // Relationship with Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
