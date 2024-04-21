<?php

namespace App\Helpers\Breadcrumbs;

class BreadcrumbsHelper{

    public static function getTreeBreadCrumbs($currentMenuItem){

    }
    public static function treeMenuBreadcrumbs($currentMenuItem, $i = 0, $dataArr = [])
    {
        $dataArr[] = $currentMenuItem;
        $next = $currentMenuItem->getParentItem();
        if (!is_null($next)) {
            $dataArr[] = self::treeMenuBreadcrumbs($next, $i + 1, $dataArr);
        }
        return $dataArr;
    }

}
