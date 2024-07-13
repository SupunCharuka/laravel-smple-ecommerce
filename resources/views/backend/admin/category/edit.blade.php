@extends('backend.layouts.master')
@section('title', 'Category')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('breadcrumb-title', 'Category')
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.category') }}">Category</a></li>
    <li class="breadcrumb-item active">Edit Category</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <livewire:admin.category.edit :category="$category" />

            </div>
        </div>
    </div>
@endsection
@section('scripts')
  
@endsection
