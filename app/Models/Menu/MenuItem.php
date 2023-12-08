<?php

namespace App\Models\Menu;

use App\Events\Admin\MenuItem\CreatedMenuItemEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model {

    use HasFactory, SoftDeletes;

    protected $table = 'menu_items';
    protected $guarded = false;

    public static function boot(): void
    {
        parent::boot();

        static::creating(fn(MenuItem $model) => event(new CreatedMenuItemEvent($model)),
        );
    }
    public function getChilds($id)
    {
        return $this->where("parent_id", $id)->orderBy('position', 'ASC')->get();
    }
    public function getAll($id)
    {
        return $this->where("menu_widget_id", $id)->orderBy("position", "asc")->get();
    }

    public static function getNextSortRoot($menuId, $type)
    {
        return self::where('menu_widget_id', $menuId)->where('type', $type)->max('position') + 1;
    }

    public function getMenuWidget(){

        return $this->belongsTo('App\Models\Menu\MenuWidget', 'menu_widget_id')->first();
    }
    public function getParentItem()
    {
        return  $this->belongsTo('App\Models\Menu\MenuItem', 'parent_id')->first();
    }

    public function getMenuItemsChild()
    {
        return $this->child()->get();
    }

    public function child()
    {
        return $this->hasMany('App\Models\Menu\MenuItem', 'parent_id')->orderBy('position', 'ASC');
    }


    public function getCurrentTypeMenuCount($menuItem) : int
    {
        $widgetMenuId = $this->getMenuWidget()->id;
        if($menuItem->type == 'multiColumnItem'){
            return $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id, $menuItem->column_number)->get()->count();
        } else return $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id)->get()->count();
    }

    public function getCurrentTypeMenuMaxPosition($menuItem) : int
    {
        $widgetMenuId = $this->getMenuWidget()->id;
        if($menuItem->type == 'multiColumnItem'){
            return $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id, $menuItem->column_number)->max('position');
        } else return $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id)->max('position');
    }

    public function getCurrentTypeMenuMinPosition($menuItem) : int
    {
        $widgetMenuId = $this->getMenuWidget()->id;
        if($menuItem->type == 'multiColumnItem'){
            return $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id, $menuItem->column_number)->min('position');
        } else return $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id)->min('position');
    }
    public function getPrevRowId($menuItem)
    {
        $widgetMenuId = $this->getMenuWidget()->id;
        if($menuItem->type == 'multiColumnItem') {
            $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id, $menuItem->column_number)->max('id');
        }
        else return $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id)->max('id');
    }

    public function getNextRowId($menuItem)
    {
        $widgetMenuId = $this->getMenuWidget()->id;
        if($menuItem->type == 'multiColumnItem') {
            $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id, $menuItem->column_number)->min('id');
        }
        else return $this->getMenuQueryAll($widgetMenuId, $menuItem->parent_id)->min('id');
    }

    public static function getMenuAllRows($widgetMenuId, $type, $parentId, $column)
    {
        return self::getMenuQuery($widgetMenuId, $type, $parentId, $column)->get();
    }

    public static function getAdjacentRowById($id, $widgetMenuId, $type, $parentId, $column, $comparisonOperator)
    {
        $query = self::getMenuQuery($widgetMenuId, $type, $parentId, $column);

        $query->where('id', $comparisonOperator, $id);

        return $comparisonOperator == '<' ? $query->max('id') : $query->min('id');
    }
    public function getMenuQueryAll($widgetMenuId, $parentId, $columnNumber = null)
    {
        $query = $this->where('menu_widget_id', '=', $widgetMenuId)->where('parent_id', '=', $parentId);
        if ($columnNumber !== null) {
            $query->where('column_number', '=', $columnNumber);
        }
        return $query;
    }
}
