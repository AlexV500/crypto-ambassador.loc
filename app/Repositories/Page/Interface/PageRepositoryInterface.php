<?php

namespace App\Repositories\Page\Interface;

interface PageRepositoryInterface
{
    public function countPages($lang, $publishedOnly = false);

    public function getPages(string $lang, int $paginate, bool $publishedOnly = false);

    public function takePages(string $lang, int $take);
}
