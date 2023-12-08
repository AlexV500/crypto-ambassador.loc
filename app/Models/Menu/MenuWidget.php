<?php

namespace App\Models\Menu;

use App\Events\Admin\MenuWidget\CreatedMenuWidgetEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuWidget extends Model{

    use HasFactory, SoftDeletes;

    protected $table = 'menu_widget';
    protected $guarded = false;

    public static function boot(): void
    {
        parent::boot();

        static::creating(fn (MenuWidget $model) =>
            event(new CreatedMenuWidgetEvent($model)),
        );
    }

    public static function bySystemName($systemName){

        return self::where('system_name', '=', $systemName)->first();
    }

    public function getItems(){

        return $this->hasMany('App\Models\Menu\MenuItem', 'menu_widget_id')->with('child')->where('parent_id', 0)->orderBy('position', 'ASC')->get();
    }

    public function getAllItems(){

        return $this->hasMany('App\Models\Menu\MenuItem', 'menu_widget_id')->with('child')->get();
    }

}
