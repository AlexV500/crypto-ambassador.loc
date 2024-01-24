<?php

namespace App\Models\Blog;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $guarded = false;

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

//    public function post(): BelongsTo
//    {
//        return $this->belongsTo(Post::class);
//    }
    public function getDateAsCarbonAttribute(){

        return Carbon::parse($this->created_at);
    }
}
