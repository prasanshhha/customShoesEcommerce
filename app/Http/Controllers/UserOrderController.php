<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function addToCart($id){
        $cartItem = Product::findOrFail($id);
        $user = User::findOrFail(Auth::user()->id);
        $order = Order::where([['user_id', $user->id], ['status', 'cart']])->first();
        if($order){
            $orderItem = OrderItem::where([['order_id', $order->id], ['product_id', $cartItem->id]])->first();
            if($orderItem){
                return back()->with('info', "This product is already in your cart!");
            }
            $order->total = $order->total + $cartItem->price;
            $order->save();
        }else{
            $order = $this->newOrder($cartItem ,$user, "cart");
        }
        $orderItem = $this->newOrderItem($order, $cartItem);
        return back()->with('success', "Added to Cart!");
    }


    public function addToWishlist($id){
        $wishlistItem = Product::findOrFail($id);
        $user = User::findOrFail(Auth::user()->id);
        $order = Order::where([['user_id', $user->id], ['status', 'wishlist']])->first();
        if($order){
            $orderItem = OrderItem::where([['order_id', $order->id], ['product_id', $wishlistItem->id]])->first();
            if($orderItem){
                return back()->with('info', "This product is already in your wishlist!");
            }
            $order->total = $order->total + $wishlistItem->price;
            $order->save();
        }else{
            $order = $this->newOrder($wishlistItem ,$user, "wishlist");
        }
        $orderItem = $this->newOrderItem($order, $wishlistItem);
        return back()->with('success', "Added to wishlist!");
    }


    public function newOrder($orderItem, $user, $status){
        $newOrder = [
            'user_id' => $user->id,
            'date' => now(),
            'contact' => $user->phone_number,
            'total' => $orderItem->price,
            'status' => $status,
        ];

        return Order::create($newOrder);
    }

    public function newOrderItem($order, $orderItem){
        $orderItem = [
            'order_id' => $order->id,
            'product_id' => $orderItem->id,
            'quantity' => '1',
            'price' => $orderItem->price
        ];

        return OrderItem::create($orderItem);
    }

    public function removeFromWishlist($id){
        $wishlistItem = OrderItem::findOrFail($id);
        $wishlistItem->delete();
        return back()->with('success','Removed from wishlist!');
    }

    public function removeFromCart($id){
        $cartItem = OrderItem::findOrFail($id);
        $order = Order::findOrFail($cartItem->order_id);
        $order['total'] = $order->total - $cartItem->price;
        $order->save();
        $cartItem->delete();
        return back()->with('success','Removed from cart!');
    }

    public function updateQuantity(Request $request){
        $orderItem = OrderItem::findOrFail($request->id);
        $orderItem['quantity'] = $request->quantity;
        $orderItem->save();
        $order = Order::findOrFail($orderItem->order_id);
        $order['total'] = $request->total;
        $order->save();
        return response()->json(['success' => true, 'data' => $orderItem, $order]);
    }
}
