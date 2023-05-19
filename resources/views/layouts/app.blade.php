<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        {{-- Bootstrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        {{-- Custom styles --}}
        <link rel="stylesheet" href="{{ asset("assets/css/styles.css") }}">
        {{-- Font awesome --}}
        <script src="https://kit.fontawesome.com/ece295e505.js" crossorigin="anonymous"></script>
        <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
        </script>
        {{-- Light Slider --}}
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/lightslider.css')}}" />   
        <script src="{{asset('/assets/js/lightslider.js')}}"></script>
    </head>
    <body>
        {{-- Navbar --}}
        @include('layouts.nav')
        
        <div class="page-content">
            @yield('content')
        </div>
        
        {{-- Footer --}}
        @include('layouts.footer')

        {{-- Bootstrap CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        @include('sweetalert::alert')
        @yield('scripts')
    </body>
</html>