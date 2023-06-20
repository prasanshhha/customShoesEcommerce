@extends('layouts.app')

@section('title', "Customize")

@section('content')
<div class="container page">
    <div class="customize container mb-5 pb-5">
        <h2 class="mb-5 pt-5">Here's the result!</h2><hr>
        <div class="row">
            <div class="template-card">
                <div class="custom-design">
                    <img src="{{ asset("custom/".$filename.'.jpg') }}" class="template-img" alt="img">
                </div>
                <h5 class="mt-2">{{ $template->name }}</h5>
                <p class="fw-bold">Nrs. {{ $template->price }}</p>
                <div class="buttons d-flex">
                    <a href="/customize/{{ $template->id }}"><button class="btn rounded-pill btn-dark btn-primary me-3">Back to customize</button></a>
                    <form action="/addToCart/custom/{{ $template->id }}" method="POST">
                        @csrf
                        <input type="text" name="custom-file" value="{{ $filename }}.jpg" hidden>
                        <input type="submit" name="" id="" class="btn rounded-pill btn-dark btn-primary" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection