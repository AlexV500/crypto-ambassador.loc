<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuBreadcrumbs extends Component
{
    public $html;
    private $menuBreadcrumbs;
    private $menuItem;
    private $menuWidget;
    private $title;

    /**
     * Create a new component instance.
     */
    public function __construct($menuBreadcrumbs, $menuWidget, $menuItem, $title)
    {
        $this->menuBreadcrumbs = $menuBreadcrumbs;
        $this->menuWidget = $menuWidget;
        $this->menuItem = $menuItem;
        $this->title = $title;
        $this->html = $this->prepareRender($menuBreadcrumbs);
    }

    public function prepareRender($menuBreadcrumbs){
      //     dd($menuBreadcrumbs);
        $htmlImp = implode('', array_reverse(explode('@', $this->renderCrumbs($menuBreadcrumbs))));
     //   dd($html);
        return $htmlImp;
    }

    private function renderCrumbs($renderCrumbs){

        $html = '';
        if(is_array($renderCrumbs) && (count($renderCrumbs) > 0)){
            if($renderCrumbs[0]->parent_id == 0){
                $route = route('admin.menu.menuitem.index', $this->menuWidget->id);
            } else {
                $route = route('admin.menu.submenuitem.index', [$this->menuWidget->id, $renderCrumbs[0]->id]);
            }
        } if($renderCrumbs[0]->id !== $this->menuItem->id){
            $html .= '<li class="breadcrumb-item"><a href="'.$route.'">'.$renderCrumbs[0]->label.'</a> </li>@';
        } else {
            $html .= '<li class="breadcrumb-item">'.$this->title.' '.$renderCrumbs[0]->label.'</li>@';
        }
        if(isset($renderCrumbs[1])){
            $html .= $this->renderCrumbs($renderCrumbs[1]);
        }
        return $html;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.menu-breadcrumbs');
    }
}
