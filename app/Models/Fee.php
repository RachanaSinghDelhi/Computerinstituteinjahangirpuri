<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student; // Correct namespace

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'receipt_number',
        'amount',
        'payment_date',
        'due_date',
        'receipt_image',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
