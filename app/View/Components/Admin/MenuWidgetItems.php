<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuWidgetItems extends Component
{
    public $html;
    private $treeMenuItems;

    private $menuItem;
    private $menuWidget;

    /**
     * Create a new component instance.
     */
    public function __construct($treeMenuItems, $menuWidget, $menuItem)
    {
        $this->treeMenuItems = $treeMenuItems;
        $this->menuWidget = $menuWidget;
        $this->menuItem = $menuItem;
        $menuWidgetPosition = $menuWidget->position;
        $this->html = $this->prepareRender($this->treeMenuItems->$menuWidgetPosition);
    }

    public function prepareRender($menuItems){

     //   dd($menuItems);

        $html = '<label>Вибрати батьківські пункти меню</label>';
        $html .= '<div class="form-group">';
        $html .= '<select name="parent_id" class="form-control">';
        $html .= $this->renderOptions($menuItems, 0);
        $html .= '</select>';
        $html .= '</div>';

        return $html;
    }
    private function renderOptions($menuItems, $parentId)
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
                    $html .= $this->renderOptions($menuItem->child, $menuItem->id);
                }
            }
        }
        return $html;
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.menu-widget-items');
    }
}
