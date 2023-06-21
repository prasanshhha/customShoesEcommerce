@extends('layouts.app')

@section('title', 'My Cart')

@section('content')
<div class="container page">
    <section class="cart container mb-5 pb-5">
        <h2 class="mb-5 pt-5">My Orders</h2>
        <hr>
        <div class="cart-table">
            <table class="table table-hover mt-3 mb-5">
                <thead>
                    <tr>
                        <a href="/">
                            <th>Order Number</th>
                            <th>Payment Status</th>
                            <th>Order Date</th>
                            <th>Order Total</th>
                        </a>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($placed_orders as $placed_order)
                        <tr class='clickable-row' data-href='/order-details/{{ $placed_order->id }}'>
                            <td>{{ $placed_order->id }}</td>
                            <td>{{ $placed_order->payment_status }}</td>
                            <td>{{ $placed_order->date }}</td>
                            <td>{{ $placed_order->total }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@endsection