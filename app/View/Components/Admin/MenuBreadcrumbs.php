<?php

namespace App\View\Components\Admin;

use App\Helpers\Breadcrumbs\BreadcrumbsHelper;
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
    public function __construct($menuWidget, $menuItem, $title)
    {
        $menuBreadcrumbs = BreadcrumbsHelper::treeMenuBreadcrumbs($menuItem);
        $this->menuWidget = $menuWidget;
        $this->menuItem = $menuItem;
        $this->title = $title;
        $this->html = $this->prepareRender($menuBreadcrumbs);
    }

    public function prepareRender($menuBreadcrumbs){
     //   dd($menuBreadcrumbs);
      //     dd($this->renderCrumbs($menuBreadcrumbs));
        $htmlImp = implode('', array_reverse(explode('@', $this->renderCrumbs($menuBreadcrumbs))));
     //   $htmlImp = '';
        return $htmlImp;
    }

    private function renderCrumbs($renderCrumbs){

        $html = '';
        $renderCrumbsCount = count($renderCrumbs);
        for ($count = 0; $count < $renderCrumbsCount; $count++)
        {
            if(!is_array($renderCrumbs[$count])){
                if($renderCrumbs[$count]->parent_id == 0){
                    $route = route('admin.menu.menuitem.index', $this->menuWidget->id);
                } else {
                    $route = route('admin.menu.submenuitem.index', [$this->menuWidget->id, $renderCrumbs[$count]->id]);
                }
                if($renderCrumbs[$count]->id !== $this->menuItem->id){
                    $html .= '<li class="breadcrumb-item"><a href="'.$route.'">'.$renderCrumbs[$count]->label.'</a> </li>@';
                } else {
                    $html .= '<li class="breadcrumb-item">'.$this->title.' '.$renderCrumbs[$count]->label.'</li>@';
                }
            } else {
                $html = $this->renderCrumbs($renderCrumbs[$count]);
            }
        }


//        $html .= '<li class="breadcrumb-item"><a href="'.$route.'">'.$renderCrumbs[0]->label.'</a> </li>@';
//        $html .= '<li class="breadcrumb-item">'.$this->title.' '.$renderCrumbs[0]->label.'</li>@';

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
