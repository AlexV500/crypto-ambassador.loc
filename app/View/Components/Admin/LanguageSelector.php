<?php

namespace App\View\Components\Admin;

use App\Helpers\Localization\TranslRepositoryHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Http\Entities\Site;

class LanguageSelector extends Component
{
    public $siteEntity;
    public $contentItemRepository;
    public $originalContentId;
    public $contentTitle;
    public $route;
    public $publicRoute;
    public $locales;
    public $getLocaleName;
    public $getCurrentLocale;
    public $getDefaultLocale;
    public function __construct($siteEntity, $contentItemRepository, $contentItem, $route, $publicRoute)
    {
        $this->siteEntity = $siteEntity;
        $this->contentItemRepository = $contentItemRepository;
        $this->route = $route;
        $this->publicRoute = $publicRoute;
        $this->getLocaleName = $siteEntity->getLocaleName();
        $this->getCurrentLocale = $siteEntity->getCurrentLocale();
        $this->getDefaultLocale = $siteEntity->getDefaultLocale();
        $this->originalContentId = $this->getOriginalContentId($contentItem);
        $this->contentTitle = $this->getOriginalContentTitle($contentItem);
        $this->locales = $this->getAllLocalizations($siteEntity->getAllLocalizations());
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.language-selector');
    }

    public function getOriginalContentId($post) : string
    {
        return $post->original_content_id;
    }

    public function getOriginalContentTitle($post)
    {
        $post = $this->contentItemRepository->getTranslatedArticle($post->original_content_id, $this->getDefaultLocale);
        return $post->title;
    }

    public function getAllLocalizations($locales){

        return $this->disableReadyTranslations($this->cutCurrentLocale($locales));
    }

    private function disableReadyTranslations($locales){

        $filtered = [];
   //     $repository = TranslRepositoryHelper::initTranslationsRepository($this->siteEntity, $this->publicRoute);

        foreach ($locales as $locale => $localeName){
            $count = $this->contentItemRepository->countTranslatedArticle($this->originalContentId, $locale);
            if($count == 0){
                $filtered[$locale] = $localeName;
            }
        } return $filtered;
    }

    private function cutCurrentLocale($locales){
        return array_filter($locales, function($k) {
            return (($k !== $this->getCurrentLocale) or ($k !== $this->getDefaultLocale));
        }, ARRAY_FILTER_USE_KEY);
    }
}
