@extends('frontend.layouts.master')
@section('title', 'Products')
@section('styles')
@endsection
@section('content')

    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            <div class="flex justify-center my-4">
                <form class="flex items-center w-full max-w-md">
                    <div class="relative flex w-full">
                        <input
                            class="form-control pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-gray-500 w-full"
                            type="search" placeholder="Search products" aria-label="Search">
                    </div>
                </form>
            </div>

            <div class="row" id="products-container">
            </div>
            <div class="btn-box" id="pagination-links">
            </div>
        </div>
    </section>


@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/frontend/product.js') }}"></script>
@endsection
