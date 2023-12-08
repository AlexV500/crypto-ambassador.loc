<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tags';
    protected $guarded = false;

    public function tagPosts(){
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
