<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments'; // Ensure correct table name

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'status',
        'file_name',
        'student_id',
        'course_id',
        'added_by',
        'updated_by',
    ];

    protected $casts = [
        'deadline' => 'date', // Ensure 'deadline' is treated as a date
    ];

    /**
     * Get the course associated with the assignment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Get the student associated with the assignment.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * Get the user who added the assignment.
     */
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    /**
     * Get the user who last updated the assignment.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
