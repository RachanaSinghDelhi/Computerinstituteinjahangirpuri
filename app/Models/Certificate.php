<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'certificates';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
    
        'NAME',
        'FATHER',
        'DT',
        'DATE',
        'COURSE',
        'PHOTO',
        'Certificate_type',
        'Duration',
        'Desc',
        'Grade',
        'Code',
    ];

    protected $casts = [
        'dt' => 'datetime', 
        'date' => 'datetime', // Make sure the 'date' column is cast to a Carbon date instance
    ];
    // Define any relationships if needed
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id'); // Adjust foreign key if necessary
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id'); // Adjust foreign key if necessary
    }
}
