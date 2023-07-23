<section class="popular-items container mb-5 pb-5">
    <h2 class="mb-5">Popular Items</h2>
    <div class="row row-cols-3 mb-5">
        @forelse ($populars as $popular)
        <div  class="product-card col mb-4">
            <a href="/viewProduct/{{ $popular->id }}">
                <div class="product-img">
                    <img src="{{ asset($popular->thumbnail)}}" class="main-img" alt="img">
                    <img src="{{ asset($popular->image_one)}}" class="overlay-img" alt="img">
                </div>
                <h5 class="mt-2">{{ $popular->name }}</h5>
            </a>
            <span class="wishlist-heart"><i class="fa-regular fa-heart"></i></span>
            <span class="wishlist-heart-top"><a href="/addToWishlist/{{ $popular->id }}"><i class="fa-solid fa-heart"></i></a></span>
            <p class="fw-bold">Nrs. {{ $popular->price }}</p>
            <a href="/addToCart/{{ $popular->id }}"><button class="btn btn-primary">Add To Cart</button></a>
        </div>
        @empty
            
        @endforelse
    </div>
</section>