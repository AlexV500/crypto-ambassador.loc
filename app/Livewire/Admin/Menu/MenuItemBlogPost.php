<?php

namespace App\Livewire\Admin\Menu;

use App\Repositories\Blog\Category\BlogCategoryRepository;
use App\Repositories\Blog\Post\BlogPostRepository;
use App\Services\Admin\Menu\MenuService;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
class MenuItemBlogPost extends Component
{
    use WithPagination;

    public $categories;
    public $selectedCategoryId = null;
    public $currentLocale;
    public $menuItem;


    public function mount($siteEntity, $menuItem)
    {
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $this->menuItem = $menuItem;
        $blogCategoryRepository = App::make(BlogCategoryRepository::class);
        $this->categories= $blogCategoryRepository->getCategories($siteEntity->getCurrentLocale());
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
        $posts = $this->refreshPosts();
        return view('livewire.admin.menu.menu-item-blog-post',
            compact('posts'));
    }

    #[On('bindMenuItem')]
    public function refreshPosts()
    {
        if(!is_null($this->selectedCategoryId)) {
            $blogPostRepository = App::make(BlogPostRepository::class);
            return $blogPostRepository->getPostsByCategoryId($this->selectedCategoryId, $this->currentLocale)->simplePaginate(4, pageName: 'images-page');
        } else return null;
    }
    public function updatedSelectedCategoryId(){
      //  dd($this->selectedCategoryId);
    }
}
