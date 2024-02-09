<?php

namespace App\Repositories\Snippet;

use App\Models\Snippet;
use App\Repositories\Snippet\Interface;
class SnippetRepository implements SnippetRepositoryInterface
{

    public function getSnippets($lang, $publishedOnly = false){
        return Snippet::locale($lang)->get();
    }

    public function getSnippetsWhithDefaultLocale($lang, $publishedOnly = false){
        return Snippet::locale($lang)->get();
    }
}
