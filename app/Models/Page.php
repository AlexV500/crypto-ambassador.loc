<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model{

    use HasFactory, SoftDeletes;

    protected $table = 'pages';
    protected $guarded = false;

    public $casts = [
        'published' => 'integer',
    ];

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
}
