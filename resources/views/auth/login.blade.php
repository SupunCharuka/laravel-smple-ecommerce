@extends('frontend.layouts.master')
@section('title', 'Login')
@section('styles')
@endsection
@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Login</strong></div>
            </div>
        </div>
    </div>

    <div class="product_section layout_padding">
        <div class="container">
            <div class="col-lg-7 mx-auto">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <div class="font-weight-bold">{{ __('Whoops! Something went wrong.') }}</div>
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li class="">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="card">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                        </div>
                
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                        </div>
                
                        <div class="form-check mb-3">
                            <input id="remember_me" type="checkbox" name="remember" class="form-check-input" style="padding: 0px; width: 16px !important;height: 16px !important;" />
                            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                        </div>
                
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Log in') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@endsection
