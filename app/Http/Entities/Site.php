<?php

namespace App\Http\Entities;

use App\Models\User;
use Illuminate\Support\Str;

class Site{

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

    public function getLocalizedURL($index, $cname){

//        $url = request()->fullUrl();
//
//        if($index == $this->getDefaultLocale()){
//            if($cname == ''){
//                $url = url('/');
//            } else {
//                $url = url('/'.$cname);
//            }
//
//        } else {
//            if($cname == ''){
//                $url = url('/'.$index);
//            } else {
//                $url = url('/'.$index.'/'.$cname);
//            }
//        }

        $localePrefix = $index === $this->getDefaultLocale() ? '' : '/' . $index;
        $cnameSegment = $cname !== '' ? '/' . $cname : '';



//        $url = request()->fullUrl();
//        $url = url()->current();
//        $parsed_url = parse_url($url);



//        $lengthLocale = 2;
//
//        if((trim($index) == $this->getDefaultLocale()) && (($this->getCurrentLocale() == $this->getDefaultLocale()))) {
//            //    $parsed_url['path'] = preg_replace('%^/?' . $this->getLocale() . '/%', '$1', $this->getLocale() . '/' . $parsed_url['path']);
////            if(isset($parsed_url['path'])){
////                $lengthPath = mb_strlen($parsed_url['path'], 'UTF-8');
////                if($lengthPath >= $lengthLocale){
////                    $parsed_url['path'] = substr($parsed_url['path'], $lengthLocale + 1);
////                    // $parsed_url['path'] = $index.'/'.$parsed_url['path'];
////                }
////            }
//            return $url;
//        }
//
//        if((trim($index) == $this->getDefaultLocale()) && (($this->getCurrentLocale() !== $this->getDefaultLocale()))) {
//        //    $parsed_url['path'] = preg_replace('%^/?' . $this->getLocale() . '/%', '$1', $this->getLocale() . '/' . $parsed_url['path']);
//            if(isset($parsed_url['path'])){
//                $lengthPath = mb_strlen($parsed_url['path'], 'UTF-8');
//                if($lengthPath >= $lengthLocale){
//                    $parsed_url['path'] = substr($parsed_url['path'], $lengthLocale + 1);
//                   // $parsed_url['path'] = $index.'/'.$parsed_url['path'];
//                } else {
//                    $parsed_url['path'] = $index.'/'.$parsed_url['path'];
//                }
//            }
//        }
//        if((trim($index) !== $this->getDefaultLocale()) && (($this->getCurrentLocale() == $this->getDefaultLocale()))) {
//            if(array_key_exists($index, $this->getAllLocalizations())){
//                if(isset($parsed_url['path'])){
//                   $parsed_url['path'] = $index.$parsed_url['path'];
//
//                }
//            }
//        }
//        if((trim($index) !== $this->getDefaultLocale()) && (($this->getCurrentLocale() !== $this->getDefaultLocale()))) {
//            if(array_key_exists($index, $this->getAllLocalizations())){
//                if(isset($parsed_url['path'])){
//                    $lengthPath = mb_strlen($parsed_url['path'], 'UTF-8');
//                    if($lengthPath >= $lengthLocale + 1){
//                        $parsed_url['path'] = substr($parsed_url['path'], $lengthLocale + 1);
//                        $parsed_url['path'] = $index.$parsed_url['path'];
//                    }
//
//                }
//            }
//        }
//        $url = $this->unparseUrl($parsed_url);
//        $url = rtrim($url, '/');
//        $parsed_url['path'] = rtrim($parsed_url['path'], '/');

        return url($localePrefix . $cnameSegment);
    }

    protected function unparseUrl($parsed_url)
    {
        if (empty($parsed_url)) {
            return '';
        }

        $url = '';
        $url .= isset($parsed_url['scheme']) ? $parsed_url['scheme'].'://' : '';
        $url .= $parsed_url['host'] ?? '';
        $url .= isset($parsed_url['port']) ? ':'.$parsed_url['port'] : '';
        $user = $parsed_url['user'] ?? '';
        $pass = isset($parsed_url['pass']) ? ':'.$parsed_url['pass'] : '';
        $url .= $user.(($user || $pass) ? "$pass@" : '');

        if (!empty($url)) {
            $url .= isset($parsed_url['path']) ? '/'.ltrim($parsed_url['path'], '/') : '';
        } else {
            $url .= $parsed_url['path'] ?? '';
        }

        $url .= isset($parsed_url['query']) ? '?'.$parsed_url['query'] : '';
        $url .= isset($parsed_url['fragment']) ? '#'.$parsed_url['fragment'] : '';

        return $url;
    }


    public static function isAdmin(){
//        if(auth()->user()->role == USER::ROLE_ADMIN){
//            return true;
//        } return false;
        return false;
    }

    public function setlocale() : self{

        $this->locale = '';
        $requestedLocale = request()->segment('1', '');
        $availableLocales = $this->getAllLocalizations();

        if ($requestedLocale && array_key_exists($requestedLocale, $availableLocales) && $requestedLocale !== $this->getConfigLocale()) {
            $this->locale = $requestedLocale;
        }

        return $this;

    }
    public function setCurrentlocale() : self{
        $this->currentLocale = $this->getDefaultLocale();
        $locale = request()->segment('1', '');
        if($locale && array_key_exists($locale, $this->getAllLocalizations()) && $locale !== $this->getDefaultLocale()){
            $this->currentLocale = $locale;
        } return $this;
    }
    public function setAllLocalizations(){

//        $array = $this->getConfigLocales();
//        $keyToFind = $this->getConfigLocale();
//        $newDefaultKey = '';
//        $defaultRow = [];
//        $newArray = [];
//
//        if(array_key_exists($newDefaultKey, $array)){
//            $this->allLocalizations = $array;
//        }
//
//        if (array_key_exists($keyToFind, $array)) {
//            //    $array[$defaultValue] = $array[$keyToFind];
//            $defaultRow[$newDefaultKey] = $array[$keyToFind];
//            unset($array[$keyToFind]);
//            //    unset($array[$defaultValue]);
//            $newArray = $defaultRow + $array;
//            $this->allLocalizations = $newArray;
//        }
        $this->allLocalizations = $this->getConfigLocales();
        return $this;
    }



    public function setCurrentLocaleName(){

        $locale = $this->getCurrentLocale();
        if(trim(empty($locale))){
            $this->currentLocaleName =  $this->getAllLocalizations()[$locale];
        }
        $this->currentLocaleName =  $this->getAllLocalizations()[$this->getCurrentLocale()];

        return $this;
    }

    public function getLocale(){
        return $this->locale;
    }
    public function getAllLocalizations(){

        return $this->allLocalizations;
    }
    public function getCurrentLocale(){

        return $this->currentLocale;
    }
    public function getCurrentLocaleName(){

        return $this->currentLocaleName;
    }

    public function getConfigLocale(){

        return config('app.locale');
    }
    public function getDefaultLocale(){

        return config('app.defaultLocale');
    }

    public function __call($name, $arguments) {
        if ($name === 'getConfigLocales') {
            return $this->getConfigLocalesNonStatic();
        }
    }

    public static function __callStatic($name, $arguments) {
        if ($name === 'getConfigLocales') {
            return self::getConfigLocalesStatic();
        }
    }
    public static function getConfigLocalesStatic(){

        return config('app.locales');
    }
    public function getConfigLocalesNonStatic(){

        return config('app.locales');
    }
}
