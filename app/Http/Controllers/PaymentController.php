<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';

use Cixware\Esewa\Client;
use Cixware\Esewa\Config;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceOrderRequest;

class PaymentController extends Controller
{
    public function esewaPay($id){
        $order = Order::findOrFail($id);
        // Set success and failure callback URLs.
        $successUrl = env('BASE_URL').'/success';
        $failureUrl = env('BASE_URL').'/failure';
        
        // Config for development.
        $config = new Config($successUrl, $failureUrl);
        
        // Config for production.
        // $config = new Config($successUrl, $failureUrl, 'b4e...e8c753...2c6e8b');
        
        // Initialize eSewa client.
        $esewa = new Client($config);
        $esewa->process($order->id, $order->total, 0, 0, 0);  //pid, net, tax, service charge, delivery charge
    }

    public function esewaPaySuccess(){
        $id = $_GET['oid'];
        $order = Order::findOrFail($id);
        $order->status = "ordered";
        $order->payment_status = "complete";
        $order->save();
        return redirect('/')->with('success', 'Your payment was successful!');
    }

    public function esewaPayFailed(){
        return redirect('/checkout')->with('error', 'Oh no, your payment was not successful!');

    }

    public function placeOrder(PlaceOrderRequest $request, $id){
        $order = Order::findOrFail($id);
        $input = $request->validated();
        $input['date'] = now();
        $input['location'] = $input['address'].', '.$input['city'];
        unset($input['name']);
        $order->update($input);
        if($request['payment_method'] == "esewa"){
            $this->esewaPay($id);
        }else{
            return redirect('/')->with('success', "Your order has been placed!");
        }
    }
}
