<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.nav', function ($view) {
            $view->with('categories', Category::select('id', 'name')->get());
            if (Auth::check()) {
                $view->with('cartCount', Order::where([['user_id', Auth::user()->id], ['status', 'cart']])->has('orderItems')->get()->count());
                $view->with('wishlistCount', Order::where([['user_id', Auth::user()->id], ['status', 'wishlist']])->has('orderItems')->get()->count());
            }
        });

    }
} 
