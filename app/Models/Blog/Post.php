<?php

namespace App\Models\Blog;

use App\Events\Admin\Blog\Post\CreatePostEvent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $table = 'posts';
    protected $guarded = false;

    public $casts = [
        'published' => 'integer',
        'posted_at' => 'date'
    ];

    /**
     * @var array
     */
    public $dates = [
        'created_at'
    ];

    /**
     * @var array
     */
//    public $fillable = [
//        'title',
//        'uri',
//        'meta_keywords',
//        'meta_description',
//        'content',
//        'published',
//        'created_at',
//    ];

    protected $withCount = ['LikedUsers'];
    protected $with = ['categories', 'tags'];

    public static function boot(): void
    {
        parent::boot();

        static::created(fn(Post $model) => event(new CreatePostEvent($model)),
        );

    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function likedUsers(){
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('published', '=' ,1);
    }

    public function scopeLocale(Builder $query, string $lang)
    {
        return $query->where('lang', '=', $lang);
    }

    public function getDateAsCarbonAttribute(){

        return Carbon::parse($this->custom_date);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('post-images');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function toSitemapTag(): Url | string | array
    {
        return Url::create('/blog/posts/'.$this->uri)
            ->setLastModificationDate(Carbon::create($this->created_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.1);

//        return Url::create(route('blog.post.show', $this))
//            ->setLastModificationDate(Carbon::create($this->created_at))
//            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
//            ->setPriority(0.1);
    }
}
