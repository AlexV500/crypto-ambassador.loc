<?php

namespace App\View\Components;

use App\Http\Entities\Site;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LanguageSwitcher extends Component
{

    public $content;
    public $contentModel;
    public $siteEntity;

    public function __construct($content, $contentModel){

        $this->content = $content;
        $this->siteEntity = new Site();
    }

    public function render(): View|Closure|string
    {
        return view('components.languageswitcher');
    }

    public function getTranlationLinks($content){

        foreach($this->siteEntity->getAllLocalizations() as $index => $localeName){

        }
    }
}
