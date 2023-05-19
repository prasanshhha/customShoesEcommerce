<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserPagesController extends Controller
{
    public function homepage(){
        $items = OrderItem::select('product_id', DB::raw('count(product_id) AS total_count'))->groupBy('product_id')->orderByDesc('total_count')->get();
        if($items->count() >= 3){
            $n = 3;
        }else{
            $n = $items->count();
        }
        for($i = 0 ; $i < $n ; $i++){
            $populars[$i] = Product::findOrFail($items[$i]->product_id);
        }
        return view('index')->with(compact('populars'));
    }

    public function allCategories(){
        $products = Product::select('id', 'name', 'description', 'thumbnail', 'image_one', 'stock', 'price', 'category_id')->get();
        $category_name = "All Shoes";
        return view('products')->with(compact('products', 'category_name'));
    }

    public function selectedCategory($id){
        $products = Product::select('id', 'name', 'description', 'thumbnail', 'image_one', 'stock', 'price', 'category_id')->where('category_id', $id)->get();
        $category_name = Category::select('name')->where('id', $id)->first()->name;
        return view('products')->with(compact('products', 'category_name'));
    }

    public function search(Request $request){
        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')
                            ->orWhereHas('category', function ($query) use ($request) {
                                return $query->where('name', 'LIKE', '%'.$request->search.'%');
                            })->get();
        $search = $request->search;

        return view('products')->with(compact('products', 'search'));
    }

    public function viewProduct($id){
        $product = Product::where('id', $id)->first();
        return view('product')->with(compact('product'));
    }

    public function cart(){
        $userId = Auth::user()->id;
        $cartItems = OrderItem::whereHas('order', function ($query) use($userId){
            $query->where([['user_id', $userId], ['status', 'cart']]);
        })->get();
        return view('cart')->with(compact('cartItems'));
    }

    public function wishlist(){
        $userId = Auth::user()->id;
        $wishlistItems = OrderItem::whereHas('order', function ($query) use($userId){
            $query->where([['user_id', $userId], ['status', 'wishlist']]);
        })->get();
        return view('wishlist')->with(compact('wishlistItems'));
    }

    public function checkout(){
        $userId = Auth::user()->id;
        $order = Order::where([['user_id', $userId], ['status', 'cart']])->first();
        $cartItems = OrderItem::whereHas('order', function ($query) use($userId){
            $query->where([['user_id', $userId], ['status', 'cart']]);
        })->get();
        return view('checkout')->with(compact('cartItems', 'order'));
    }
}
