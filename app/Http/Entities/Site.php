<?php

namespace App\Http\Entities;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

class Site
{

    private $domain;
    private $locale;
    private $defaultLanguage;
    private $allLocalizations;
    private $currentLocale;
    private $currentLocaleName;

    public function __construct()
    {
        $this->setAllLocalizations();
        $this->setLocale();
        $this->setCurrentLocale();
        $this->setCurrentLocaleName();

    }

    public function getLocalizedURL($index, $cname)
    {
        $localePrefix = $index === $this->getDefaultLocale() ? '' : '/' . $index;
        $cnameSegment = $cname !== '' ? '/' . $cname : '';
        return url($localePrefix . $cnameSegment);
    }


    public static function isAdmin()
    {
//        if(auth()->user()->role == USER::ROLE_ADMIN){
//            return true;
//        } return false;
        return false;
    }

    public function setlocale(): self
    {

        $this->locale = '';
        $requestedLocale = request()->segment('1', '');
        $availableLocales = $this->getAllLocalizations();

        if ($requestedLocale && array_key_exists($requestedLocale, $availableLocales) && $requestedLocale !== $this->getConfigLocale()) {
            $this->locale = $requestedLocale;
        }
        return $this;
    }

    public function setCurrentlocale(): self
    {
        $this->currentLocale = $this->getDefaultLocale();
        $locale = request()->segment('1', '');
        if ($locale && array_key_exists($locale, $this->getAllLocalizations()) && $locale !== $this->getDefaultLocale()) {
            $this->currentLocale = $locale;
        }
        return $this;
    }

    public function setAllLocalizations()
    {
        $this->allLocalizations = $this->getConfigLocales();
        return $this;
    }


    public function setCurrentLocaleName()
    {
        $locale = $this->getCurrentLocale();
        if (trim(empty($locale))) {
            $this->currentLocaleName = $this->getAllLocalizations()[$locale];
        }
        $this->currentLocaleName = $this->getAllLocalizations()[$this->getCurrentLocale()];

        return $this;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function getAllLocalizations()
    {
        return $this->allLocalizations;
    }

    public function getCurrentLocale()
    {

        return $this->currentLocale;
    }

    public function getCurrentLocaleName()
    {

        return $this->currentLocaleName;
    }

    public function getConfigLocale()
    {

        return config('app.locale');
    }

    public function getConfigLocales()
    {

        return config('app.locales');
    }

    public function getDefaultLocale()
    {

        return config('app.defaultLocale');
    }

    public function checkDefaultLocale(): bool
    {

        return $this->getCurrentLocale() === $this->getDefaultLocale();
    }

    public function __call($name, $arguments)
    {
        if ($name === 'getConfigLocales') {
            return $this->getConfigLocalesNonStatic();
        }
    }

    public static function __callStatic($name, $arguments)
    {
        if ($name === 'getConfigLocales') {
            return self::getConfigLocalesStatic();
        }
    }

    public static function getConfigLocalesStatic()
    {

        return config('app.locales');
    }

    public function getConfigLocalesNonStatic()
    {

        return config('app.locales');
    }

    public function getRepositoriesByRouteName() : object{
        return collect([
            'blog.post.show' => 'App\Repositories\Blog\Post\BlogPostRepository',
            'blog.category.post.index' => 'App\Repositories\Blog\Category\BlogCategoryRepository',
            'blog.tag.post.index' => 'App\Http\Controllers\Blog\Tag\BlogTagRepository',
        ]);
    }
}

