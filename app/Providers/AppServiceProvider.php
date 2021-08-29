<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('front.layout._sidebar', function($view){
            if (Cache::has('sidebar_categories')){
                $sidebar_categories = Cache::get('sidebar_categories');
            }else{
                $sidebar_categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('sidebar_categories',$sidebar_categories, 30);
            }

            if (Cache::has('sidebar_tags')){
                $sidebar_tags = Cache::get('sidebar_tags');
            }else{
                $sidebar_tags = Tag::with('posts')->limit(6)->get();
                Cache::put('sidebar_tags',$sidebar_tags, 30);
            }


            $view->with('recent_posts', Post::orderBy('id', 'desc')->limit(5)->get());
            $view->with('sidebar_categories', $sidebar_categories);
            $view->with('sidebar_tags', $sidebar_tags);

        });
        view()->composer('admin.layout.layout', function($view){
            $view->with('userCheck', Auth::user());
            $view->with('newCommentsCount', Comment::where('status', 1)->count());

        });


    }
}
