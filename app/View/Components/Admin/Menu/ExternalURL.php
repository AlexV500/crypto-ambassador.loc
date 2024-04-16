<?php

namespace App\View\Components\Admin\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExternalURL extends Component
{

    public $menuItemId;
    public function __construct($menuItemId)
    {
        $this->menuItemId = $menuItemId;
    }
    public function render(): View|Closure|string
    {
        return view('components.admin.menu.external-url');
    }
}
