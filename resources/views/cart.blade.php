@extends('layouts.app')

@section('title', 'My Cart')

@section('content')
<div class="container page">
    <section class="cart container mb-5 pb-5">
        <h2 class="mb-5 pt-5">My Cart</h2>
        <hr>
        <div class="cart-table">
            <table class="table my-5">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cartItems as $cartItem)
                        <tr>
                            <td class="d-flex">
                                <a href="/viewProduct/{{ $cartItem->product->id }}">
                                    <img src="{{ asset($cartItem->product->thumbnail) }}" alt="pic" height="150px" width="200px" style="object-fit: cover">
                                </a>
                                <div class="ms-3">
                                    <div>{{ $cartItem->product->name }}</div>
                                    <div class="product-price" id="price_{{ $cartItem->id }}">{{ $cartItem->product->price }}</div>
                                </div>
                            </td>
                            <td>
                                <input type="number" name="quantity" id="quantity_{{ $cartItem->id }}" class="me-3 quantity" value="{{ $cartItem->quantity }}">
                                <a href="/removeFromCart/{{ $cartItem->id }}"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                            <td>
                                <span class="total" id="total_{{ $cartItem->id }}"></span>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex">
                <div class="ms-auto order-total">
                    <span class="fw-bold">Subtotal:</span><span id="subtotal" class="ms-2"></span>
                    <a href="/checkout" class="d-block mt-4"><button class="btn btn-dark rounded-pill w-100">Check Out</button></a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $.fn.getAllTotal();
            $.fn.getSubtotal();
        });

        $.fn.getSubtotal = function(){
            var totals = $('.total');
            var subtotal = 0.00;
            $.each(totals, function (i, total) {
                subtotal = subtotal + parseFloat(total.innerHTML);
            });
            $('#subtotal').html(subtotal);
        }

        $.fn.getAllTotal = function(id){
            let quantities = $('.quantity');
            let prices = $('.product-price');
            let totals = $('.total');
            $.each(quantities, function (i, qt) {
                let sum = parseFloat(prices[i].innerHTML) * parseFloat(qt.value);
                totals[i].innerHTML = sum; 
            });
        }

        $.fn.getTotal = function(id){
            let price = $('#price_'+id).html();
            let qt = $('#quantity_'+id).val();
            let total = parseFloat(price) * parseFloat(qt);
            $('#total_'+id).html(total);
            return {
                orderItemId : id,
                quantity : qt
            }
        }

        $('.quantity').on("change", function(){
            let elem = event.target.id;
            let id = elem.split('_')[1];
            let info = $.fn.getTotal(id);
            $.fn.getSubtotal();
            let subtotal = $('#subtotal').html();

            $.ajax({
                url:'/updateQuantity',
                type: "GET",
                dataType: 'json',
                data: {id: info.orderItemId, quantity: info.quantity, total:subtotal},
                success: function (data) {
                    var x = JSON.stringify(data);
                    console.log(x);
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        });
    </script>
@endsection