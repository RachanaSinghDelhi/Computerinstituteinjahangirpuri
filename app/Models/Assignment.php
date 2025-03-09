<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'course_id', 
        'file_name', // Changed from file_path to file_name
        'due_date', 
        'status', 
        'student_id', // Directly linking to a student
        'added_by', 
        'updated_by'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
