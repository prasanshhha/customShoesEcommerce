@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container page">
    <section class="container mb-5 pb-5">
        <h2 class="mb-5 pt-5">Checkout</h2>
        <hr>
        <div class="h-100 row">
            <div class="col border-end">
                <div>
                    <form action="/place-order/{{ $order->id }}"  method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $order->user->name }}" required readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="number" class="form-control" id="contact" name="contact"  value="{{ $order->user->phone_number }}" required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="col-md-6">
                            <label for="payment_method" class="form-label">Payment method</label>
                            <select id="payment_method" class="form-select" name="payment_method" id="payment_method">
                                <option id="cod" value="cash_on_delivery" selected>Cash on delivery</option>
                                <option id="card" value="card">Card Payment</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" id="codPay" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                <div>
                    <table class="table">
                        <tbody class="checkout-table">
                            @forelse ($cartItems as $cartItem)
                            <tr>
                                <td class="d-flex">
                                    <a href="/viewProduct/{{ $cartItem->product->id }}">
                                        <img src="{{ asset($cartItem->product->thumbnail) }}" alt="pic" height="100px" width="150px" style="object-fit: cover">
                                    </a>
                                </td>
                                <th class="text-start">{{ $cartItem->product->name }}</th>
                                <th class="price text-start">{{ $cartItem->product->price }}</th>
                                <th class="text-start">x <span class="quantity">{{ $cartItem->quantity }}</span></th>
                                <th class="total text-end"></th>
                            </tr>
                            @empty
                                
                            @endforelse
                            @forelse ($customItems as $customItem)
                            <tr>
                                <td class="d-flex">
                                    <img src="{{ asset('custom/'.$customItem->image) }}" alt="pic" height="100px" width="150px" style="object-fit: cover">
                                </td>
                                <th class="text-start">Custom</th>
                                <th class="price text-start">{{ $customItem->price }}</th>
                                <th class="text-start">x <span class="quantity">{{ $customItem->quantity }}</span></th>
                                <th class="total text-end"></th>
                            </tr>
                            @empty
                                
                            @endforelse
                            <tr class="grandTotal">
                                <td colspan="2" class="text-end">Subtotal</td>
                                <th colspan="3" class="text-end">{{ $order->total }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        let quantities = $('.quantity');
        let prices = $('.price');
        let totals = $('.total');
        $.each(quantities, function (i, qt) {
            let sum = parseFloat(prices[i].innerHTML) * parseFloat(qt.innerHTML);
            totals[i].innerHTML = sum;
        });
    });
</script>
@endsection