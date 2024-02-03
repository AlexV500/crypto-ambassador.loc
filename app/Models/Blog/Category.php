<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $guarded = false;

//    public function posts(){
//        return $this->hasMany(Post::class, 'category_id', 'id');
//    }

    public function categoryPosts(){
        return $this->belongsToMany(Post::class, 'post_categories', 'category_id', 'post_id');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('published', '=' ,1);
    }

    public function scopeLocale(Builder $query, string $lang)
    {
        return $query->where('lang', '=', $lang);
    }
}
