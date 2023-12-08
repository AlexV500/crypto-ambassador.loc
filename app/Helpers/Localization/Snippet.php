<?php

namespace App\Helpers\Localization;

use App\Http\Entities\Site;
use Illuminate\Support\Facades\DB;

class Snippet{

    public static function getSnippet($systemName) {

        $site = new Site();
        $snippet = DB::table('snippets')->where('system_name', $systemName)->where('lang', $site->getCurrentlocale())->first();

        if($snippet !== NULL){
            return html_entity_decode(self::makeAsset($snippet->content));
        }
        else return '';
    }

    private static function makeAsset($content){

        $matches = [];
        $baseUrl = url('/');
        preg_match_all('/{{(.*?)}}/', $content, $matches);
        $curlyBracketsData = $matches[1];

// Извлечение данных из круглых скобок () и удаление кавычек
        $parenthesesData = [];
        preg_match_all('/\((["\'])(.*?)\1\)/', $content, $matches);
        foreach ($matches[2] as $match) {
            $parenthesesData[] = $match;
        }

// Замена содержимого фигурных скобок на данные из круглых скобок
        foreach ($curlyBracketsData as $index => $curlyData) {
            $content = str_replace("{{" . $curlyData . "}}", $baseUrl.'/public/'.$parenthesesData[$index], $content);
        }
        return $content;
    }
}
