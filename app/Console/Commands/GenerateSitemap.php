<?php

namespace App\Console\Commands;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // modify this to your own needs

//        SitemapGenerator::create(config('app.url'))
//            ->writeToFile(public_path('sitemap.xml'));

        Sitemap::create()
            ->add($this->build_index(Post::where('published', '=', 1)->get(), 'sitemap_posts.xml'))
         //   ->add($this->build_index(Post::all(), 'sitemap_posts.xml'))
            ->add($this->build_index(Category::all(), 'sitemap_categories.xml'))
            ->add(Url::create('/')->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS))
            ->writeToFile(public_path('sitemap.xml'));
    }

    protected function build_index($model, $path) : string {

        Sitemap::create()
            ->add($model)
            ->writeToFile(public_path($path));
        return $path;
    }
}
