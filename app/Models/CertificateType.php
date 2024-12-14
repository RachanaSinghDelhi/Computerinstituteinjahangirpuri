<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateType extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's naming conventions
    protected $table = 'certificate_types';

    // Specify which fields can be mass assigned, including 'duration' if it's part of the table
    protected $fillable = ['course_id', 'certificate_type', 'description', 'duration'];

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

