<?php

namespace App\View\Components\Admin\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExternalURL extends Component
{

    public $menuItem;
    public function __construct()
    {
    //    $this->menuItem = $menuItem;
    }
    public function render(): View|Closure|string
    {
        return view('components.admin.menu.external-url');
    }
}
