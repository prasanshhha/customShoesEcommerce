<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset("assets/images/title-logo.png") }}" alt="Logo" width="150" height="auto" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ms-4">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown ms-4">
                    <a class="nav-link dropdown-toggle" href="{{ route('categories.all') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('categories.all') }}">All</a></li>
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link" aria-current="page" href="/customize">Customize</a>
                </li>
                @if (auth()->check())
                <li class="nav-item ms-4">
                    <form class="form-inline" action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-link logout-button" type="submit">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item ms-4">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                @endif
            </ul>
            <form class="d-flex ms-4 nav-search" role="search" method="GET" action="/search">
                <input name="search" class="me-2 search-box" type="search" placeholder="Search" aria-label="Search">
                <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="/cart" class="align-self-center text-dark  mx-3"><i class="fa-solid fa-cart-shopping"></i></a>
                @if (isset($cartCount) && $cartCount>0)
                <span class="cart-notif"></span>
                @endif
                @if (isset($wishlistCount) && $wishlistCount>0)
                <span class="wishlist-notif"></span>
                @endif
                <a href="/wishList" class="align-self-center text-dark"><i class="fa-solid fa-heart"></i></a>
            </form>
        </div>
    </div>
</nav>