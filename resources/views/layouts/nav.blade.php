<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset("assets/images/title-logo.png") }}" alt="Logo" width="150" height="auto" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ms-4">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown ms-4">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">All</a></li>
                        <li><a class="dropdown-item" href="#">Sneakers</a></li>
                        <li><a class="dropdown-item" href="#">Nike A1</a></li>
                        <li><a class="dropdown-item" href="#">Anime</a></li>
                        <li><a class="dropdown-item" href="#">Florals</a></li>
                        <li><a class="dropdown-item" href="#">Cartoon</a></li>
                        <li><a class="dropdown-item" href="#">Custom designs</a></li>
                    </ul>
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
            <form class="d-flex ms-4 nav-search" role="search">
                <input class="me-2 search-box" type="search" placeholder="Search" aria-label="Search">
                <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="#" class="align-self-center text-dark  mx-3"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="#" class="align-self-center text-dark"><i class="fa-solid fa-heart"></i></a>
            </form>
        </div>
    </div>
</nav>