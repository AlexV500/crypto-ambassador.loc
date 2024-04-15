<?php

namespace App\Livewire\Admin\Menu;

use App\Repositories\Blog\Category\BlogCategoryRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class MenuItemBlogPost extends Component
{
    public $categories;
    public $selectedCategory=null;
    public $posts;
    public $currentLocale;

    public function mount($siteEntity){
        $this->currentLocale = $siteEntity->getCurrentLocale();
        $blogCategoryRepository = App::make(BlogCategoryRepository::class);
        $this->categories= $blogCategoryRepository->getCategories($siteEntity->getCurrentLocale());
    }
    public function render()
    {
        return view('livewire.admin.menu.menu-item-blog-post');
    }

    public function updatedSelectedPosts($categoryId){
        $blogCategoryRepository = App::make(BlogCategoryRepository::class);
        $this->posts=$blogCategoryRepository->getCategoryPosts($category, 4);
    }
}
