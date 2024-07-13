@if ($products->isEmpty())
    <div class="col-12">
        <p class="text-center">No products found.</p>
    </div>
@else
    @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
                <div class="option_container">
                    <div class="options">
                        <a href="#" class="option1 add-to-cart" data-product-id="{{ $product->id }}">Add To Cart</a>
                        <a href="#" class="option2">Buy Now</a>
                    </div>
                </div>
                <div class="img-box">
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
                <div class="detail-box">
                    <h5>{{ $product->title }}</h5>
                    <h6>${{ $product->price }}</h6>
                </div>
            </div>
        </div>
    @endforeach
@endif
