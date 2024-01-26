<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Template;
use App\Models\OrderItem;
use App\Models\CustomItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PlaceOrderRequest;

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
            $order = $this->newOrder($cartItem->price ,$user, "cart");
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
            $order = $this->newOrder($wishlistItem->price ,$user, "wishlist");
        }
        $orderItem = $this->newOrderItem($order, $wishlistItem);
        return back()->with('success', "Added to wishlist!");
    }

    public function addCustomShoeToCart(Request $request, $id){
        $template = Template::findOrFail($id);
        if(!$template){
            return back()->with('error', "This template does not exist!");
        }
        $user = User::findOrFail(Auth::user()->id);
        $order = Order::where([['user_id', $user->id], ['status', 'cart']])->first();
        if($order){
            $order->total = $order->total + $template->price;
            $order->save();
        }else{
            $order = $this->newOrder($template->price ,$user, "cart");
        }
        $orderItem = $this->newCustomOrderItem($order, $template, $request['custom-file']);
        return back()->with('success', "Added to cart!");
    }

    public function newOrder($price, $user, $status){
        $newOrder = [
            'user_id' => $user->id,
            'date' => now(),
            'contact' => $user->phone_number,
            'total' => $price,
            'status' => $status,
        ];

        return Order::create($newOrder);
    }

    public function newCustomOrderItem($order, $template, $filename){
        $customItem = [
            'order_id' => $order->id,
            'image' => $filename,
            'quantity' => '1',
            'price' => $template->price
        ];

        return CustomItem::create($customItem);
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
        $order = Order::findOrFail($wishlistItem->order_id);
        $order['total'] = $order->total - $wishlistItem->price;
        $order->save();
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

    public function removeCustomFromCart($id){
        $customItem = CustomItem::findOrFail($id);
        $order = Order::findOrFail($customItem->order_id);
        $order['total'] = $order->total - $customItem->price;
        $order->save();
        $customItem->delete();
        return back()->with('success','Removed from cart!');
    }

    public function updateQuantity(Request $request){
        $orderItem = OrderItem::findOrFail($request->id);
        if($orderItem->product->stock < $request->quantity){
            abort();
            return response()->json(['error' => true, 'message'=>"Not enough stock"]);
        }
        $orderItem['quantity'] = $request->quantity;
        $orderItem->save();
        $order = Order::findOrFail($orderItem->order_id);
        $order['total'] = $request->total;
        $order->save();
        return response()->json(['success' => true, 'data' => $orderItem, $order]);
    }

    public function updateCustomQuantity(Request $request){
        
        $customItem = CustomItem::findOrFail($request->id);
        $customItem['quantity'] = $request->quantity;
        $customItem->save();
        $order = Order::findOrFail($customItem->order_id);
        $order['total'] = $request->total;
        $order->save();
        return response()->json(['success' => true, 'data' => $customItem, $order]);
    }
}
