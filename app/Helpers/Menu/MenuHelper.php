<?php

namespace App\Helpers\Menu;

use App\Helpers\URI\URIHelper;
use App\Models\Menu\MenuWidget;

class MenuHelper{

    public static function treeMenuItems($siteEntity, $widgetPosition = 'All')
    {
        $currentLocale = $siteEntity->getCurrentLocale();
        if($widgetPosition == 'All'){
            $menuWidgetPositions = config('menu.menuWidgetPositions');
            $menuWidgetCollection = collect($menuWidgetPositions);
            $menuItems = $menuWidgetCollection->map(function ($item, $key) use ($currentLocale) {
                $widgetMenuItems = self::getWidgetMenuItems($currentLocale, $key);
                return self::getTreeMenuItems($widgetMenuItems['rootMenuItems'], $widgetMenuItems['allMenuItems']);
            });
        }
        else {
            $widgetMenuItems = self::getWidgetMenuItems($currentLocale, $widgetPosition);
            $menuItems = self::getTreeMenuItems($widgetMenuItems['rootMenuItems'], $widgetMenuItems['allMenuItems']);
            $menuItems = collect($menuItems);
        }
        $menuItems->toJson();
        return json_decode($menuItems);
    }

    public static function getWidgetMenuItems($currentLocale, $position) : array{
       $widget = MenuWidget::locale($currentLocale)->where('position', '=', $position)->first();
        return ['rootMenuItems' => $widget->getItems(),
            'allMenuItems' => $widget->getAllItems()];
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

    public static function checkCurrentItemActive($siteEntity, $menuItem){
       // dd($menuItem);
        $locale = $siteEntity->checkDefaultLocale() ? '' : $siteEntity->getCurrentLocale().'/';
        $menuURL = $locale.$menuItem->url_segments.'/'.$menuItem->url;
        $getCurrentResourceUrlPath = URIHelper::getCurrentResourceUrlPath($siteEntity);
        return $getCurrentResourceUrlPath == $menuURL;
    }
}
