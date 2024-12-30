<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    use HasFactory;

    // Define the table name if it differs from the default
    protected $table = 'student_fees';

    // Define which fields are mass assignable
    protected $fillable = [
        'student_id',
        'student_name',
        'admission_date',
        'course_id',
        'total_fee',
        'fees_paid',
        'fees_due',
        'status',
    ];

    // Optionally, you can define relationships here if needed
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
