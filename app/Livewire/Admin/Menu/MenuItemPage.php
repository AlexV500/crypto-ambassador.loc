<?php

namespace App\Livewire\Admin\Menu;

use App\Repositories\Blog\Post\BlogPostRepository;
use App\Repositories\Page\PageRepository;
use App\Services\Admin\Menu\MenuService;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
class MenuItemPage extends Component
{
    use WithPagination;

    public $currentLocale;
    public $menuItem;


    public function mount($siteEntity, $menuItem)
    {
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->menuItem = $menuItem;
    }

    public function bindMenuItem($uri)
    {
        $menuService = App::make(MenuService::class);
        $menuService->bindMenuItem($this->menuItem, $uri, 'blog');
        $this->dispatch('bindMenuItem');
    }

    public function unBindMenuItem()
    {
        $menuService = App::make(MenuService::class);
        $menuService->unBindMenuItem($this->menuItem);
        $this->dispatch('bindMenuItem');
    }

    public function render()
    {
        $pages = $this->refreshPages();
        return view('livewire.admin.menu.menu-item-page',
            compact('pages'));
    }

    #[On('bindMenuItem')]
    public function refreshPages()
    {
        $pageRepository = App::make(PageRepository::class);
        return $pageRepository->getPages($this->currentLocale)->simplePaginate(4, pageName: 'images-page');

    }
}
