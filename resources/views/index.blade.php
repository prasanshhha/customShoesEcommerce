@extends('layouts.app')

@section('title', 'Home')

@section('content')
{{-- Full page video --}}
<div class="video-background-holder">
    <div class="video-background-overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="{{ asset("assets/videos/walking.mp4") }}" type="video/mp4">
        </video>
    <div class="video-background-content container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
                <h1 class="display-4">FIND YOUR PERFECT PAIR</h1>
                <p class="lead mb-3">Create the shoes of your dreams.</p>
                <p class="lead">
                    <a href="#" class="text-white">
                        <button class="btn customize-button">Customize</button>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

{{-- About us section --}}
<section class="container py-5 w-50 my-5 about-us">
    <div>
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula libero eu lectus dignissim eleifend. Suspendisse potenti. Maecenas id dolor eget risus dignissim blandit non a odio. Etiam luctus ultrices urna, in rhoncus velit dignissim sed. Nulla consequat augue quis enim malesuada vehicula. Sed varius bibendum dolor, sit amet finibus elit.</p>
    </div>
</section>

{{-- Popular items --}}
<section class="popular-items container mb-5 pb-5">
    <h2 class="mb-5">Popular Items</h2>
    <div class="row mb-5">
        <div class="col-md-4">
            <img src="{{ asset("assets/images/doggo.jpg") }}" alt="Product 1">
            <h3 class="mt-3">Sneakers</h3>
            <p>Nrs. 3500</p>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
        <div class="col-md-4">
            <img src="{{ asset("assets/images/shoePic.jpg") }}" alt="Product 2">
            <h3 class="mt-3">Nike A1</h3>
            <p>Nrs. 3500</p>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
        <div class="col-md-4">
            <img src="{{ asset("assets/images/custom.webp") }}" alt="Product 3">
            <h3 class="mt-3">Nike A1</h3>
            <p>Nrs. 3500</p>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
    </div>
</section>
@endsection