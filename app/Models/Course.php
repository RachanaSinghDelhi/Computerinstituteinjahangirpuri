<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\student;
class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_title',
        'course_desc',
        'course_content',
        'course_image',
        'course_url',
        'duration',
        'total_fees',
        'installments',
    ];

    protected $table = 'courses';

    public function certificateTypes()
    {
        return $this->hasMany(CertificateType::class, 'course_id');
    }


    public function scopeOrderByDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function students()
{
    return $this->hasMany(Student::class);
}


   
}
