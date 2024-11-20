<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'tags', 'url', 'user_id'];

    /**
     * Relationship: A post belongs to a user (author).
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
