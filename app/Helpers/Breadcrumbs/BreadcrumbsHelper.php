<?php

namespace App\Helpers\Breadcrumbs;

class BreadcrumbsHelper{

    public static function getTreeBreadCrumbs($currentMenuItem){

    }
    public static function treeMenuBreadcrumbs($currentMenuItem, $i = 0)
    {
        $dataArr = [];
        $parentItem = $currentMenuItem->getParentItem();
        if($i == 0){
            $dataArr[] = $currentMenuItem;
            $next = $currentMenuItem;
        } else {
            $dataArr[] = $parentItem;
            $next = $parentItem;
        }
        if ($next->parent_id > 0) {
            $dataArr[] = self::treeMenuBreadcrumbs($next, $i + 1);
        }
        return $dataArr;
    }

}
