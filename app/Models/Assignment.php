<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'course_id',
        'student_id',
        'questions',
        'deadline',
        'status',
        'added_by',
    ];

    protected $casts = [
        'questions' => 'array', // Convert questions to an array automatically
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

   // public function student() {
     //   return $this->belongsTo(Student::class, 'student_id');
    //}
    

    // ✅ Add the missing relationship for 'added_by' (user who created the assignment)
    public function addedBy() {
        return $this->belongsTo(User::class, 'added_by'); // Assuming 'User' model
    }
// Define Many-to-Many Relationship with Students
public function students() {
    return $this->belongsToMany(Student::class, 'assignment_student', 'assignment_id', 'student_id');
}
    
}
