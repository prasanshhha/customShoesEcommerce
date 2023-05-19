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
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $order->user->name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="number" class="form-control" id="contact" name="contact"  value="{{ $order->user->phone_number }}">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{ $order->user->email }}">
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="col-md-6">
                            <label for="payment_method" class="form-label">Payment method</label>
                            <select id="payment_method" class="form-select">
                                <option id="cod" value="cash_on_delivery">Cash on delivery</option>
                                <option id="esewa" value="esewa">Esewa</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Place Order</button>
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
                                        <img src="{{ asset($cartItem->product->thumbnail) }}" alt="pic" height="150px" width="200px" style="object-fit: cover">
                                    </a>
                                </td>
                                <th class="text-start">{{ $cartItem->product->name }}</th>
                                <th class="price text-start">{{ $cartItem->product->price }}</th>
                                <th class="text-start">x <span class="quantity">{{ $cartItem->quantity }}</span></th>
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