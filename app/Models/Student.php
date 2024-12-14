<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class Student extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'student_id',
        'name',
        'father_name',
        'doa',
        'batch',
        'photo',
        'course_id',
        'contact_number'
    ];


    // Define the relationship to the Course model
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id'); // Use 'course_id' as the foreign key

    }

public function fees()
{
    return $this->hasMany(Fee::class);
}

    
}

