@extends('frontend.layouts.master')
@section('title', 'Cart')
@section('styles')
@endsection
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="product_section layout_padding">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cart as $item)
                                    <tr data-product-id="{{ $item['productId'] }}">
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('storage/products/' . $item['image']) }}" alt="Image"
                                                class="img-fluid" width="75">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $item['name'] }}</h2>
                                        </td>
                                        <td class="product-price">${{ $item['price'] }}</td>
                                        <td class="product-quantity">
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus"
                                                        type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center"
                                                    value="{{ $item['quantity'] }}" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1"
                                                    data-product-id="{{ $item['productId'] }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus"
                                                        type="button">&plus;</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-total">${{ $item['price'] * $item['quantity'] }}</td>
                                        <td><a href="javascript:void(0)" data-product-id="{{ $item['productId'] }}"
                                                class="btn btn-primary btn-sm product-remove">X</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black cart-subtotal">
                                        ${{ array_sum(array_map(function ($item) {return $item['price'] * $item['quantity'];}, $cart)) }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black cart-total">
                                        ${{ array_sum(array_map(function ($item) {return $item['price'] * $item['quantity'];}, $cart)) }}
                                    </strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-primary btn-lg py-3 btn-block" href="{{ route('checkout') }}" >Proceed
                                        To Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('js/frontend/cart.js') }}"></script>
@endsection
