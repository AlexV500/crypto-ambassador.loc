<?php

namespace App\Models\Media;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;

Relation::morphMap([
   'Post' => 'App\Models\Blog\Post'
]);

class Image extends Model{

    use HasFactory, SoftDeletes;

    protected $table = 'images';
    protected $guarded = false;

    public function transaction(){

        return $this->morphTo();
    }
}

