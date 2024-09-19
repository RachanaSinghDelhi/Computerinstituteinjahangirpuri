<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_title',
        'course_desc',
        'course_content',
        'course_image',
        'course_url',
    ];
    public function scopeOrderByDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
   
}
