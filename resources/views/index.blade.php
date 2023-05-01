<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset("assets/css/styles.css") }}">
        <script src="https://kit.fontawesome.com/ece295e505.js" crossorigin="anonymous"></script>
    </head>
    <body>
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset("assets/images/title-logo.png") }}" alt="Logo" width="150" height="auto" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown ms-4">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
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
                        <li class="nav-item ms-4">
                            <a class="nav-link" href="#">Admin Portal</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="me-2 search-box" type="search" placeholder="Search" aria-label="Search">
                        <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="#" class="align-self-center text-dark  mx-3"><i class="fa-solid fa-cart-shopping"></i></a>
                        <a href="#" class="align-self-center text-dark"><i class="fa-regular fa-heart"></i></a>
                    </form>
                </div>
            </div>
        </nav>
        

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
                                <button class="btn btn-light">Customize</button>
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
            <div class="row">
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

        {{-- Footer --}}
        <footer id="footer" class="footer mt-5">
            
            <div class="container">
                <div class="row gy-3">
                    <div class="col-lg-3 col-md-6 footer-links d-flex">
                        <i class="bi bi-clock icon"></i>
                        <div>
                            <img src="{{ asset('assets/images/solemate-dark.png') }}" alt="logo" width="150" height="auto">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                        Sifal, Kathmandu <br>
                        Nepal<br>
                        </p>
                    </div>
                    </div>
            
                    <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reach us</h4>
                        <p>
                        <strong>Phone:</strong> 9863481822<br>
                        <strong>Email:</strong> solemate@gmail.com<br>
                        </p>
                    </div>
                    </div>
            
                    <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="tiktok"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Solemate</span></strong>. All Rights Reserved
                </div>
            </div>
        
          </footer>

        {{-- Bootstrap CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>