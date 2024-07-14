@extends('frontend.layouts.master')
@section('title', 'Checkout')
@section('styles')
@endsection
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <a
                        href="{{ route('cart') }}">Cart</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Checkout</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="product_section layout_padding">
        <div class="container">
            <livewire:frontend.checkout />
           
        </div>
    </div>
@endsection
@section('scripts')
@endsection
