<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentVersion extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'old_data', 'new_data', 'updated_by', 'status'];

    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array', // ✅ FIX: Ensure `new_data` is cast as an array
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'updated_by', 'id');
}

  // ✅ Force JSON decoding for new_data
  public function getNewDataAttribute($value)
  {
      return json_decode($value, true) ?? []; // Ensures it's always an array
  }


}

