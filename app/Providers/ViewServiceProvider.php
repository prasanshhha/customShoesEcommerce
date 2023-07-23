<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
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
                $view->with(
                    'cartCount', Order::where([['user_id', Auth::user()->id], ['status', 'cart']])
                    ->where(function ($query) {
                        $query->has('orderItems')->orHas('customItems');
                    })->get()->count()
                );
                $view->with('wishlistCount', Order::where([['user_id', Auth::user()->id], ['status', 'wishlist']])->has('orderItems')->get()->count());
            }
        });

        $items = OrderItem::select('product_id', DB::raw('count(product_id) AS total_count'))->groupBy('product_id')->orderByDesc('total_count')->get();
        if($items->count() >= 3){
            $n = 3;
        }else{
            $n = $items->count();
        }
        if($n != 0){
            for($i = 0 ; $i < $n ; $i++){
                $populars[$i] = Product::findOrFail($items[$i]->product_id);
            }
        }else{
            $populars = Product::orderByDesc('id')->take(3)->get();
        }

        View::composer('layouts.populars', function($view) use($populars){
            $view->with('populars', $populars);
        });

    }
} 
