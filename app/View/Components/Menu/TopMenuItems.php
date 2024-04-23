<?php

namespace App\View\Components\Menu;

use App\Helpers\Menu\MenuHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
class TopMenuItems extends Component
{
        /**
     * Create a new component instance.
     */
    public function __construct($siteEntity, $menuWidgetPosition)
    {
        $treeMenuItems = MenuHelper::treeMenuItems($siteEntity->getCurrentLocale(), $menuWidgetPosition);

        }

    /**
     * Get the view / contents that represent the component.
     */

    private function renderMenuItems($menuItems, $parentId)
    {
        $html = '';
        foreach ($menuItems as $menuItem) {
            $option = '';
            $description = '';

            if ($menuItem->id == $this->menuItem->id) {
                $option = 'disabled';
                $description = '(Поточний пункт)';
            }
            if ($this->menuItem->parent_id == $menuItem->id){
                $option = 'selected="selected"';
                $description = '(Поточний батьківський пункт)';
            }
            $depth = ($parentId == 0) ? '' : str_repeat("-", $menuItem->depth);
            if ($parentId == $menuItem->parent_id) {

                $html .= '<option ' . $option . ' value="' . $menuItem->id . '">' . $depth . $menuItem->label .' '. $description .' '. '</option>';
                if (count($menuItem->child) > 0) {
                    $html .= $this->renderMenuItems($menuItem->child, $menuItem->id);
                }
            }
        }
        return $html;
    }

    public function render(): View|Closure|string
    {
        return view('components.menu.top-menu-items');
    }
}
