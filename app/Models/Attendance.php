<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'user_id', 'batch', 'status', 'attendance_date'];

    public function student()
{
    return $this->belongsTo(Student::class, 'student_id', 'id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
