@extends('frontend.layouts.master')
@section('title', 'Product Details')
@section('styles')
@endsection
@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Tank Top T-Shirt</strong></div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                            href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                                src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp"
                            class="item-thumb">
                            <img width="60" height="60" class="rounded-2"
                                src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" />
                        </a>
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp"
                            class="item-thumb">
                            <img width="60" height="60" class="rounded-2"
                                src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
                        </a>
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp"
                            class="item-thumb">
                            <img width="60" height="60" class="rounded-2"
                                src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
                        </a>
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp"
                            class="item-thumb">
                            <img width="60" height="60" class="rounded-2"
                                src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
                        </a>
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp"
                            class="item-thumb">
                            <img width="60" height="60" class="rounded-2"
                                src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
                        </a>
                    </div>
                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>
                <div class="col-lg-6">
                    <div class="main-description px-2">
                        <div class="category text-bold">
                            Category: Women
                        </div>
                        <div class="product-title text-bold my-3">
                            Black dress for Women
                        </div>


                        <div class="price-area my-4">
                            <p class="old-price mb-1"><del>$100</del> <span class="old-price-discount text-danger">(20%
                                    off)</span></p>
                            <p class="new-price text-bold mb-1">$80</p>
                            <p class="text-secondary mb-1">(Additional tax may apply on checkout)</p>

                        </div>


                        <div class="buttons d-flex my-5">
                            <div class="block">
                                <a href="#" class="shadow btn custom-btn ">Wishlist</a>
                            </div>
                            <div class="block">
                                <button class="shadow btn custom-btn">Add to cart</button>
                            </div>

                            <div class="block quantity">
                                <input type="number" class="form-control" id="cart_quantity" value="1" min="0"
                                    max="5" placeholder="Enter email" name="cart_quantity">
                            </div>
                        </div>
                    </div>
                    <div class="product-details my-4">
                        <p class="details-title text-color mb-1">Product Details</p>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat excepturi
                            odio recusandae aliquid ad impedit autem commodi earum voluptatem laboriosam? </p>
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
    <!-- content -->

    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">
                        <!-- Pills navs -->
                        <ul class="mb-3">
                            <li class="d-flex">
                                <h2 class="d-flex align-items-center justify-content-center w-100 active">Specification</h2>
                            </li>
                           
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div>
                            <div>
                                <p>
                                    With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor
                                    sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut
                                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    dolore eu fugiat nulla
                                    pariatur.
                                </p>
                                <div class="row mb-2">
                                    <div class="col-12 col-md-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><i class="fa fa-check text-success me-2"></i>Some great feature name here
                                            </li>
                                            <li><i class="fa fa-check text-success me-2"></i>Lorem ipsum dolor sit amet,
                                                consectetur</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Duis aute irure dolor in
                                                reprehenderit</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Optical heart sensor</li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-6 mb-0">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check text-success me-2"></i>Easy fast and ver good</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Some great feature name here
                                            </li>
                                            <li><i class="fa fa-check text-success me-2"></i>Modern style and design</li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table border mt-3 mb-2">
                                    <tr>
                                        <th class="py-2">Display:</th>
                                        <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Processor capacity:</th>
                                        <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Camera quality:</th>
                                        <td class="py-2">720p FaceTime HD camera</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Memory</th>
                                        <td class="py-2">8 GB RAM or 16 GB RAM</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Graphics</th>
                                        <td class="py-2">Intel Iris Plus Graphics 640</td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Similar items</h5>
                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/8.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1">
                                            Rucksack Backpack Large <br />
                                            Line Mounts
                                        </a>
                                        <strong class="text-dark"> $38.90</strong>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/9.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1">
                                            Summer New Men's Denim <br />
                                            Jeans Shorts
                                        </a>
                                        <strong class="text-dark"> $29.50</strong>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/10.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for men
                                            and lady </a>
                                        <strong class="text-dark"> $120.00</strong>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <a href="#" class="me-3">
                                        <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/11.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1"> Blazer Suit Dress Jacket for Men, Blue
                                            color </a>
                                        <strong class="text-dark"> $339.90</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('scripts')
@endsection
