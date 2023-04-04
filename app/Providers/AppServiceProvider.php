<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        $category_header = Categories::where('category_status',1)->get();
        $comment = comment::with('product')->where('user_id',1)->where('status',1)->get();

        View::share([
            'category_header'=>$category_header,
            'comment'=>$comment,
        ]);
    }
}
