<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 'ordered')->get();
        return view('admin.order.index')->with(compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $input = $request->validated();
        $order = Order::create($input);
        return redirect()->route('admin.order.index')->with('message', 'New order added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show')->with(compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit')->with(compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        try{
            $order = Order::findOrFail($id);
            $order->update($request->validated());
            return redirect()->route('admin.order.index')->with('message', 'Order updated!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Cannot update this order.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $order = Order::findOrFail($id);
            $order->delete();
            return redirect()->route('admin.order.index')->with('success','Order deleted!');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', "Cannot delete this order.");
        }
    }

    public function toggleStatus($id){
        $order = Order::findOrFail($id);
        if($order->payment_status == 'pending'){
            $order['payment_status'] = "complete";
        }else{
            $order['payment_status'] = "pending";
        }
        $order->save();
        return redirect()->route('admin.order.index')->with('message', 'Status updated!');
    }
}
