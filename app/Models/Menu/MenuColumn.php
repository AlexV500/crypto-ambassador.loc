<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuColumn extends Model {

    use HasFactory, SoftDeletes;

    protected $table = 'menu_items';
    protected $guarded = false;

    public function getMenuItems($id)
    {
        return $this->where("column_id", $id)->get();
    }
    public function getAll($id)
    {
        return $this->where("widget_menu_id", $id)->orderBy("position", "asc")->get();
    }

    public static function getNextSortRoot($menu)
    {
        return self::where('widget_menu_id', $menu)->max('position') + 1;
    }

    public function parentMenu()
    {
        return $this->belongsTo('App\Models\Menu\MenuWidget', 'widget_menu_id');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Menu\MenuItem', 'parent_id')->orderBy('position', 'ASC');
    }
}
