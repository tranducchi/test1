<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Tag;
use App\Article;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 
        $new_post = Article::select('id','slug','name','cat_id','views')->orderBy('id', 'desc')->take(8)->get();
        $new_hot = Article::select('id', 'name','slug', 'cat_id', 'views')->orderBy('views', 'desc')->take(8)->get();
        $tag = Tag::select('id','name', 'slug')->take('18')->get();
        $cat = Category::select('id', 'name', 'slug', 'parent_id')->get();
        View::share('cat', $cat);
        View::share('tag', $tag);
        View::share('new_post', $new_post);
        View::share('new_hot', $new_hot);
        
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
}
