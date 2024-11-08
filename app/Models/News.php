<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
     // Allow mass assignment for these attributes
     protected $fillable = ['title', 'content', 'author', 'published_at']; 
}
