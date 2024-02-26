<?php

namespace App\Helpers\Localization;

use App\Http\Entities\Site;

class UrlLocal{

    public static function localize($index, $cname = '') {

        $site = new Site();
        return $site->getLocalizedURL($index, $cname);
    }

    public static function changeURI($segments, $uri): array
    {
        array_pop($segments);
        $segments[] = $uri;
        return $segments;
    }

    public static function getURIfromSegments($segments)
    {
        $uri = array_pop($segments);
        return $uri;
    }

    public static function getURLs($segments, $locale): string
    {
        array_shift($segments);
        array_unshift($segments, $locale);
        return implode('/', $segments);
    }

    public static function removeDefaultLanguagePrefix(string $locale, string $defaultLocale, string $url): string
    {
        if ($locale === $defaultLocale) {
            $urlParts = explode('/', $url, 2); // Split into at most 2 parts for efficiency
            if ($urlParts[0] === $locale) {
                // Remove default language prefix
                $url = $urlParts[1] ?? ''; // Handle potential empty URL
            }
        }
        return $url;
    }
}
