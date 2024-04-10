<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\AdminController;
use App\Repositories\Page\Interface\PageRepositoryInterface;

class BaseController extends AdminController
{
    protected object $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository){

        $this->pageRepository = $pageRepository;
        parent::__construct();
    }
}
