<?php

namespace App\Helpers\Menu;

use App\Models\Menu\MenuWidget;

class MenuHelper{

    public static function treeMenuItems($currentLocale, $widgetPosition = 'All')
    {
        if($widgetPosition == 'All'){
            $menuWidgetPositions = config('menu.menuWidgetPositions');
            $menuWidgetCollection = collect($menuWidgetPositions);
            $menuItems = $menuWidgetCollection->map(function ($item, $key) use ($currentLocale) {
                $widgetMenuItems = self::getWidgetMenuItems($currentLocale, $key);
                return self::getTreeMenuItems($widgetMenuItems['rootMenuItems'], $widgetMenuItems['allMenuItems']);
            });
            $menuItems->toJson();
            return json_decode($menuItems);
        }
        else {
            $widgetMenuItems = self::getWidgetMenuItems($currentLocale, $widgetPosition);
            $menuItems = self::getTreeMenuItems($widgetMenuItems['rootMenuItems'], $widgetMenuItems['allMenuItems']);
            return $menuItems;
        }
    }

    public static function getWidgetMenuItems($currentLocale, $position) : array{
       $widget = MenuWidget::locale($currentLocale)->where('position', '=', $position)->first();
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
