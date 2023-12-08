<?php

namespace App\Helpers\Menu;

class MenuHelper{

    public static function treeMenuItems($widgetPosition = 'All')
    {
        $menuItems = [];
        if($widgetPosition == 'All'){
            $menuWidgetPositions = config('menu.menuWidgetPositions');
            $menuWidgetCollection = collect($menuWidgetPositions);
            $menuItems = $menuWidgetCollection->map(function ($item, $key) {
                $widgetMenuItems = self::getWidgetMenuItems($key);
            //    dd($widgetMenuItems);
                return self::getTreeMenuItems($widgetMenuItems['rootMenuItems'], $widgetMenuItems['allMenuItems']);
            });
        }
        $menuItems->toJson();
    //    dd(json_decode($menuItems));
        return json_decode($menuItems);
    }

    public static function getWidgetMenuItems($position) : array{
       $widget = \App\Models\Menu\MenuWidget::where('position', '=', $position)->first();
        return ['rootMenuItems' => $widget->getItems(), 'allMenuItems' => $widget->getAllItems()];
    }

    public static function getTreeMenuItems($rootMenuItems, $allMenuItems){
        $dataArr = [];
        $i = 0;
        foreach ($rootMenuItems as $item) {
            $dataArr[$i] = $item->toArray();
            $find = $allMenuItems->where('parent_id', $item->id);
            $dataArr[$i]['child'] = [];
            if ($find->count()) {
                $dataArr[$i]['child'] = self::getTreeMenuItems($find, $allMenuItems);
            }
            $i++;
        }
        return $dataArr;
    }
}
