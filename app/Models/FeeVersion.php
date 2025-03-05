<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeVersion extends Model

{
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'course_id',
        'payment_date',
        'due_date',
        'amount_paid',
        'balances',
        'receipt_number',
        'receipt_image',
        'status',
        'installment_no',
        'added_by', // Missing field added
        'approved' // Missing field added
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id'); 
    }
    
}

