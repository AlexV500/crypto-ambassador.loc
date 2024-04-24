<?php

namespace App\View\Components\Menu;

use App\Helpers\Menu\MenuHelper;
use App\Helpers\URI\URIHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
class TopMenuItems extends Component
{
    public $html;
    private $siteEntity;

     /**
     * Create a new component instance.
     */
    public function __construct($siteEntity, $menuWidgetPosition)
    {
        $this->siteEntity = $siteEntity;
        $treeMenuItems = MenuHelper::treeMenuItems($siteEntity, $menuWidgetPosition);
        $this->html = $this->prepareRender($treeMenuItems);
    }

    public function prepareRender($menuItems){

        $html = '';
        $html .= $this->renderMenuItems($menuItems);
        $html .= '';

        return $html;
    }

    private function renderMenuItems($menuItems)
    {
        $html = '';
        foreach ($menuItems as $menuItem) {

            $dropdown = '';
            $active = '';

            if(MenuHelper::checkCurrentItemActive($this->siteEntity, $menuItem)){
                $active = ' active';
            }
            if ((count($menuItem->child) > 0) or ($menuItem->menu_item_bind_type = 'menuItemDropdownTitle')) {
                $dropdown = ' dropdown';
            }
            $html .= '<li class="nav-item"><a class="nav-link' . $active . $dropdown .'" href="'.$menuItem->url_segments.'/'.$menuItem->url.'">'.$menuItem->label.'</a>';
            if (count($menuItem->child) > 0) {
                $html .= '<ul class="dropdown-menu">';
                $html .= $this->renderMenuItems($menuItem->child);
                $html .= '</ul>';
            }
            $html .= '</li>';

        }
        return $html;
    }

    public function render(): View|Closure|string
    {
        return view('components.menu.top-menu-items');
    }
}
