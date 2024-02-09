<?php

namespace App\Repositories\Snippet\Interface;

interface SnippetRepositoryInterface
{
    public function getSnippets(string $lang, bool $publishedOnly = false);

    public function getSnippetsWhithDefaultLocale(string $lang, bool $publishedOnly = false);
}
