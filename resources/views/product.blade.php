@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container page">
    <section class="products container mb-5 pb-5">
        <h6 class="pt-5 text-center mb-4">{{ $product->category->name }}: {{ $product->name }}</h6>
        <div class="row">
            <div class="col-md-7">
                <ul id="lightSlider" class="product-slider">
                    <li>
                        <img src="{{ asset($product->thumbnail) }}" alt="img">
                    </li>
                    <li>
                        <img src="{{ asset($product->image_one) }}" alt="img">
                    </li>
                    @if (isset($product->image_two))
                        <li>
                            <img src="{{ asset($product->image_two) }}" alt="img">
                        </li>
                    @endif
                    @if (isset($product->image_three))
                        <li>
                            <img src="{{ asset($product->image_three) }}" alt="img">
                        </li>
                    @endif
                  </ul>
            </div>
            <div class="col-md-5 product">
                <h2 class="mb-5 mt-5">{{ $product->name }}</h2>
                <div class="price fw-bold mb-5">Nrs. {{ $product->price }}</div>
                <div class="d-flex align-items-center w-100">
                    <span class="product-buttons">
                        <a href="/addToCart/{{ $product->id }}"><button class="btn btn-primary rounded-pill me-4">Add To Cart</button></a>
                        <a href="/addToWishlist/{{ $product->id }}"><i class="fa-solid fa-heart"></i></a>
                    </span>
                </div>
                <div class="product-desc my-5">{{$product->description}}</div>
            </div>
        </div>
    </section>
    @include('layouts.populars')
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        console.log("slideeee")
        $("#lightSlider").lightSlider();
    });
    $(document).ready(function() {
      $("#lightSlider").lightSlider({
        item: 1,
        auto: false,
        loop: false,
        controls: true,
        slideMargin: 0,
      }); 
    });
</script>
@endsection