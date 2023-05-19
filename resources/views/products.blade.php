@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container page">
    <section class="products container mb-5 pb-5">
        <h2 class="mb-5 pt-5">
            @if (isset($category_name))
                {{ $category_name }}
            @elseif (isset($search))
                Here's what we found for "{{ $search }}":
            @endif
        </h2>
        <hr>
        <div class="row row-cols-3">
            @forelse ($products as $product)
            <div  class="product-card col mb-4">
                <a href="/viewProduct/{{ $product->id }}">
                    <div class="product-img">
                        <img src="{{ asset($product->thumbnail)}}" class="main-img" alt="img">
                        <img src="{{ asset($product->image_one)}}" class="overlay-img" alt="img">
                    </div>
                    <h5 class="mt-2">{{ $product->name }}</h5>
                </a>
                <span class="wishlist-heart"><i class="fa-regular fa-heart"></i></span>
                <span class="wishlist-heart-top"><a href="/addToWishlist/{{ $product->id }}"><i class="fa-solid fa-heart"></i></a></span>
                <p class="fw-bold">Nrs. {{ $product->price }}</p>
                <a href="/addToCart/{{ $product->id }}"><button class="btn btn-primary">Add To Cart</button></a>
            </div>
            @empty
             <div class="container fs-5 w-auto mt-5">Looks like this category has no products right now.</div>
            @endforelse

        </div>
    </section>
</div>
@endsection