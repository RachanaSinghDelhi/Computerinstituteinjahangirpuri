<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentVersion extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'old_data', 'new_data', 'updated_by'];

    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}

