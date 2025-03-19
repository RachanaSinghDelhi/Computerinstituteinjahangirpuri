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
        'contact_number',
        'status',
        'added_by', // Ensure this field is mass assignable
        'is_active',
    ];

    protected $primaryKey = 'student_id'; // Set the correct primary key
  
    // Define the relationship to the Course model
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id'); // Use 'course_id' as the foreign key

    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'student_id', 'student_id'); // Adjust 'student_id' if necessary
    }
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id', 'student_id');
    }
    
    public function payments()
    {
        return $this->hasMany(Payment::class, 'student_id','student_id');
    }
    
    public function user()
{
    return $this->belongsTo(User::class, 'student_id', 'student_id');
}

}

