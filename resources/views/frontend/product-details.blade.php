@extends('frontend.layouts.master')
@section('title', 'Product Details')
@section('styles')
@endsection
@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('/') }}">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <a href="{{ route('products') }}">Products</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ $product->title }}</strong>
                </div>
            </div>
        </div>
    </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                            href="{{ asset('storage/products/' . $product->image) }}">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                                src="{{ asset('storage/products/' . $product->image) }}" />
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href="{{ asset('storage/products/' . $product->image) }}" class="item-thumb">
                            <img width="60" height="60" class="rounded-2"
                                src="{{ asset('storage/products/' . $product->image) }}" />
                        </a>

                    </div>
                </aside>
                <div class="col-lg-6">
                    <div class="main-description px-2">
                        <div class="category text-bold">
                            Category: {{ $product->category->name }}
                        </div>
                        <div class="product-title text-bold my-3">
                            {{ $product->title }}
                        </div>


                        <div class="price-area my-4">

                            <p class="new-price text-bold mb-1">${{ number_format($product->price, 2) }}</p>
                            <p class="text-secondary mb-1">(Additional tax may apply on checkout)</p>

                        </div>


                        <div class="buttons d-flex my-5">
                            <div class="block">
                                <a href="javascript:void(0)" class="shadow btn btn-info add-to-cart" data-product-id="{{ $product->id }}">Add to cart</a>
                            </div>
                            <div class="block">
                                <button class="shadow btn btn-danger buy-now" data-product-id="{{ $product->id }}">Buy Now</button>
                            </div>

                            <div class="block quantity">
                                <input type="number" class="form-control" id="cart_quantity" value="1" min="1"
                                    max="{{ $product->quantity }}" name="cart_quantity">
                            </div>
                        </div>
                    </div>
                    <div class="product-details my-4">
                        <p class="details-title text-color mb-1">Product Details</p>
                        <p class="description">{{ $product->short_description }}</p>
                    </div>

                    <div class="row questions bg-light p-3">
                        <div class="col-md-1 icon">
                            <i class="fa fa-commenting-o questions-icon"></i>
                        </div>
                        <div class="col-md-11 text">
                            Have a question about our products at E-Store? Feel free to contact our representatives via live
                            chat or email.
                        </div>
                    </div>

                    <div class="delivery my-4">
                        <p class="font-weight-bold mb-0"><span><i class="fa fa-truck"></i></span> <b>Delivery done
                                in 3 days from date of purchase</b> </p>
                        <p class="text-secondary">Order now to get this product delivery</p>
                    </div>
                    <div class="delivery-options my-4">
                        <p class="font-weight-bold mb-0"><span><i class="fa fa-filter"></i></span> <b>Delivery
                                options</b> </p>
                        <p class="text-secondary">View delivery options here</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">

                        <ul class="mb-3">
                            <li class="d-flex">
                                <h2 class="d-flex align-items-center justify-content-center w-100 active">Specification</h2>
                            </li>

                        </ul>

                        <div>
                            <div>
                                {!! $product->description !!}
                            </div>

                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Similar Products</h5>
                                @foreach ($similarProducts as $similarProduct)
                                    <div class="d-flex mb-3">
                                        <a href="{{ route('productDetails', ['product' => $similarProduct]) }}"
                                            class="me-3">
                                            <img src="{{ asset('storage/products/' . $similarProduct->image) }}"
                                                style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                        </a>
                                        <div class="info">
                                            <a href="{{ route('productDetails', ['product' => $similarProduct]) }}"
                                                class="nav-link mb-1">
                                                {{ $similarProduct->title }} <br />
                                            </a>
                                            <strong
                                                class="text-dark">${{ number_format($similarProduct->price, 2) }}</strong>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('scripts')
    <script src="{{ asset('js/frontend/add-to-cart.js') }}"></script>
    <script src="{{ asset('js/frontend/buy-now.js') }}"></script>
@endsection
