@extends('layouts.app')

@section('title', 'My Wishlist')

@section('content')
<div class="container page">
    <section class="products container mb-5 pb-5">
        <h2 class="mb-5 pt-5">My Wishlist</h2>
        <hr>
        <div class="row row-cols-3">
            
            @forelse ($wishlistItems as $wishlistItem)
            <div  class="product-card col mb-4">
                <a href="/viewProduct/{{ $wishlistItem->product->id }}">
                    <div class="product-img">
                        <img src="{{ asset($wishlistItem->product->thumbnail)}}" class="main-img" alt="img">
                        <img src="{{ asset($wishlistItem->product->image_one)}}" class="overlay-img" alt="img">
                    </div>
                    <h5 class="mt-2">{{ $wishlistItem->product->name }}</h5>
                </a>
                <span class="wishlist-remove"><a href="/removeFromWishlist/{{ $wishlistItem->id }}"><i class="fa-solid fa-xmark"></i></a></span>
                <p class="fw-bold">Nrs. {{ $wishlistItem->product->price }}</p>
                <a href="/addToCart/{{ $wishlistItem->product->id }}"><button class="btn btn-primary">Add To Cart</button></a>
            </div>
            @empty
            <div class="container mt-5 p-5 w-50 d-flex flex-column align-items-center">
                <h3>Love It? Add To My Wishlist</h3>
                <p class="text-center">My Wishlist allows you to keep track of all of your favorites and shopping activity. You won't have to waste time searching all over again for that item you loved the other day - it's all here in one place!</p>
                <a href="{{ route('categories.all') }}"><button class="btn btn-dark rounded-pill mt-5">Keep Shopping</button></a>
            </div>
            @endforelse

        </div>
    </section>
</div>
@endsection