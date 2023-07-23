@extends('layouts.app')

@section('title', 'My Cart')

@section('content')
<div class="container page">
    <section class="cart container mb-5 pb-5">
        <h2 class="mb-5 pt-5">Order Number: {{ $order->id }}</h2>
        <hr>
        <table class="table table-borderless w-50">
            <tr>
                <th>Date:</th>
                <td>{{ $order->date }}</td>
            </tr>
            <tr>
                <th>Contact:</th>
                <td>{{ $order->contact}}</td>
            </tr>
            <tr>
                <th>Payment Status:</th>
                <td>{{ ucfirst($order->payment_status) }}</td>
            </tr>
            <tr>
                <th>Payment Method:</th>
                <td>{{ ucfirst(str_replace('_',' ',$order->payment_method)) }}</td>
            </tr>
            <tr>
                <th>Location:</th>
                <td>{{ ucwords($order->location) }}</td>
            </tr>
        </table>
        <hr>
        <div class="cart-table">
            <table class="table mt-3 mb-5">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orderItems as $orderItem)
                        <tr>
                            <td class="d-flex">
                                <a href="/viewProduct/{{ $orderItem->product->id }}">
                                    <img src="{{ asset($orderItem->product->thumbnail) }}" alt="pic" height="100px" width="150px" style="object-fit: cover">
                                </a>
                            </td>
                            <td>{{ $orderItem->product->name }}</td>
                            <td>{{ $orderItem->product->price }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->quantity*$orderItem->price }}</td>
                        </tr>
                    @empty
                    @endforelse
                    @forelse ($customItems as $customItem)
                        <tr>
                            <td class="d-flex">
                                <img src="{{ asset('custom/'.$customItem->image) }}" alt="pic" height="100px" width="150px" style="object-fit: cover">
                            </td>
                            <td>Custom Shoe</td>
                            <td>{{ $customItem->price }}</td>
                            <td>{{ $customItem->quantity }}</td>
                            <td>{{ $customItem->quantity*$customItem->price }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex">
                <div class="ms-auto me-5 order-total">
                    <span class="fw-bold m-5">Order Total:&emsp;&emsp;{{ $order->total }}</span>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection