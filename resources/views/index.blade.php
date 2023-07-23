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
                    <a href="/customize" class="text-white">
                        <button class="btn rounded-pill customize-button">Customize</button>
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
@include('layouts.populars')
@endsection

@section('scripts')
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
</script>
@endsection