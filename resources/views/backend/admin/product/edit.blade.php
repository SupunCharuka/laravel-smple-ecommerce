@extends('backend.layouts.master')
@section('title', 'Products')
@section('styles')
    
     <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.css') }}">
   
@endsection
@section('breadcrumb-title', 'Products')
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.productsManage') }}">Manage Products</a></li>
    <li class="breadcrumb-item active">Edit Product</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <livewire:admin.product.edit :product="$product"/>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection
