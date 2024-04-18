<?php

namespace App\Services\Admin\Menu;

use App\Models\Menu\MenuItem;
use Illuminate\Support\Facades\DB;

class MenuService{

    public function toggleVisibility($menuItem){

        $visible = ($menuItem->published == 1) ? '0' : '1';

        try {
            DB::beginTransaction();

            // dd($data);
            DB::table('menu_items')
                ->where('id', $menuItem->id)
                ->update(['published' => $visible]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return true;
    }
    public function positionUp($menuItem) : bool
    {
        $menuItemsData = $this->initMenuItemsData($menuItem, 'Up');

        if (($menuItemsData['count']) && ($menuItemsData['nextOrPrevRow'] !== null)) {
            return $this->setPosition($menuItem, $menuItemsData['nextOrPrevRow']);
        } else return false;
    }

    public function positionDown($menuItem) : bool
    {
        $menuItemsData = $this->initMenuItemsData($menuItem, 'Down');

        if (($menuItemsData['count'] > 1) && ($menuItemsData['nextOrPrevRow'] !== null)) {
            return $this->setPosition($menuItem,  $menuItemsData['nextOrPrevRow']);
        } else return false;
    }


    public function bindMenuItem($menuItem, $uri, $segment = ""){
        try {
            DB::beginTransaction();

            // dd($data);
            DB::table('menu_items')
                ->where('id', $menuItem->id)
                ->update(['url_segments' => $segment, 'url' => $uri]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return true;
    }

    public function unBindMenuItem($menuItem){
        try {
            DB::beginTransaction();

            // dd($data);
            DB::table('menu_items')
                ->where('id', $menuItem->id)
                ->update(['url_segments' => '', 'url' => null]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return true;
    }

    protected function initMenuItemsData($menuItem, $direction) : array{

        $nextOrPrevRowPosition = null;
        $nextOrPrevRow = null;
        $widgetId = $menuItem->menu_widget_id;
        $parentId = $menuItem->parent_id;
        $count = $menuItem->getCurrentTypeMenuCount($menuItem);
        $getMaxPosition = $menuItem->getCurrentTypeMenuMaxPosition($menuItem);
        $getMinPosition = $menuItem->getCurrentTypeMenuMinPosition($menuItem);

        if($direction == 'Down'){
            if($menuItem->position < $getMaxPosition){
                $nextOrPrevRowPosition = $menuItem->position + 1;
            }
        }
        if($direction == 'Up'){
            if($menuItem->position > $getMinPosition) {
                $nextOrPrevRowPosition = $menuItem->position - 1;
            }
        }
        if($nextOrPrevRowPosition !== null){
            $nextOrPrevRow = MenuItem::where('menu_widget_id', '=', $widgetId)->where('parent_id', '=', $parentId)->where('position', '=', $nextOrPrevRowPosition)->first();
        }

        return ['count' => $count, 'nextOrPrevRow' => $nextOrPrevRow];
    }
    protected function setPosition($menuItem, $nextOrPrevRow) : bool
    {
        if(!$nextOrPrevRow){
            return false;
        }
        $prewOrNextData = MenuItem::where('id', '=',  $nextOrPrevRow->id)->first();

        try {
            DB::beginTransaction();

            // dd($data);
            DB::table('menu_items')
                ->where('id', $menuItem->id)
                ->update(['position' => $prewOrNextData->position]);

            DB::table('menu_items')
                ->where('id', $nextOrPrevRow->id)
                ->update(['position' => $menuItem->position]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return true;
    }

}
