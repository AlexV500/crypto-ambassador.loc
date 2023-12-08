<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLike extends Model
{
    use HasFactory;

    protected $table = 'post_user_likes';
    protected $guarded = false;
}
