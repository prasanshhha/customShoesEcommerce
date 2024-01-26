<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';

use Cixware\Esewa\Client;
use Cixware\Esewa\Config;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CustomItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PlaceOrderRequest;

class PaymentController extends Controller
{
    public function placeOrder(PlaceOrderRequest $request, $id){
        try {
            $order = Order::findOrFail($id);
            $input = $request->validated();
            $input['date'] = now();
            $input['location'] = $input['address'].', '.$input['city'];
            unset($input['name']);
            $order->update($input);
            if($request['payment_method'] == "card"){
                return $this->cardPayment($id);
            }else{
                $order->status = "ordered";
                $order->save();
                return redirect('/')->with('success', "Your order has been placed!");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Some error occured.");
        }
    }
    
    public function cardPayment($id){
        try{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $userId = Auth::user()->id;
            $order = Order::findOrFail($id);
            $cartItems = OrderItem::whereHas('order', function ($query) use($userId){
                $query->where([['user_id', $userId], ['status', 'cart']]);
            })->with('product')
            ->get()
            ->toArray();
            $customItems = CustomItem::whereHas('order', function ($query) use($userId){
                $query->where([['user_id', $userId], ['status', 'cart']]);
            })
            ->get()
            ->toArray();

            $products = array_merge($cartItems, $customItems);
            $productDetails = [];
            foreach ($products as $p){
                if (array_key_exists('product',$p)) {
                    $name = $p['product']['name'];
                }else{
                    $name = "Custom Shoe";
                }

                $productDetails[] = [
                    'price_data' => [
                        'product_data' => [
                            'name' => $name,
                        ],
                        'currency' => 'NPR',
                        'unit_amount' => ($p['price']*100),
                    ],
                    'quantity' => $p['quantity'],
                ];
            }
            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items' => $productDetails,
                'mode' => 'payment',
                'success_url' => route('success', $id),
                'cancel_url' => route('failure'),
            ]);
            return redirect($checkoutSession->url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Some error occured.");
        }
    }

    public function cardPaySuccess($orderId){
        try{
            $order = Order::findOrFail($orderId);
            $order->status = "ordered";
            $order->payment_status = "complete";
            $order->save();
            return redirect('/')->with('success', 'Your payment was successful!');
        } catch (\Exception $e) {
            return redirect('/checkout')->with('error', "Some error occured.");
        }
    }

    public function cardPayFailed(){
        return redirect('/checkout')->with('error', 'Oh no, your payment was not successful!');
    }
}
