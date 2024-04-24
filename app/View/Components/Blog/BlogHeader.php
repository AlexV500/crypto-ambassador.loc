<?php

namespace App\View\Components\Blog;

use App\Services\LanguageSwitcherService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Http\Entities\Site;

class BlogHeader extends Component
{
    public $isAdmin;
    public $siteEntity;

    protected object $languageSwitcherService;
    /**
     * Create a new component instance.
     */
    public function __construct($siteEntity)
    {
        $this->isAdmin = $this->isAdmin();
        $this->siteEntity = $siteEntity;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.header.index', [
            'siteEntity ' => $this->siteEntity,
        ]);
    }

    public function isAdmin(){
        return Site::isAdmin();
    }

}
