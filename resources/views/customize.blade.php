@extends('layouts.app')

@section('title', "Customize")

@section('content')
<div class="container page">
    <div class="customize container mb-5 pb-5">
        <h2 class="mb-5 pt-5">Customize your shoes!</h2><hr>
        <div class="row row-cols-3">
            @forelse ($templates as $template)
            <div  class="template-card col mb-4">
                <a href="/customize/{{ $template->id }}">
                    <div class="templates">
                        <img src="{{ asset("assets/images/templates/".$template->image)}}" class="template-img" alt="img">
                    </div>
                    <h5 class="mt-2">{{ $template->name }}</h5>
                </a>
                <p class="fw-bold">Nrs. {{ $template->price }}</p>
                <a href="/customize/{{ $template->id }}"><button class="btn rounded-pill btn-dark btn-primary">Customize</button></a>
            </div>
            @empty
             <div class="container fs-5 w-auto mt-5">Looks like there are no templates right now.</div>
            @endforelse
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection