<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFeesStatus extends Model
{
    use HasFactory;

    // Table name (if it is different from the default "student_fees_status")
    protected $table = 'student_fees_status';

    // Primary key (if it is not the default 'id')
    protected $primaryKey = 'id'; 

    // Fillable columns to allow mass assignment
    protected $fillable = [
        'student_id',
        'name',
        'course_id',
        'total_fees',
        'installments',
        'fees_paid',
        'fees_due',
        'status',
    ];

    // If you want to cast attributes to specific types (like decimals, dates, etc.)
    protected $casts = [
        'total_fees' => 'decimal:2',
        'fees_paid' => 'decimal:2',
        'fees_due' => 'decimal:2',
        'admission_date' => 'date',
    ];

    // Define relationships (if necessary)
    
    // A StudentFeesStatus belongs to a Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // A StudentFeesStatus belongs to a Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
