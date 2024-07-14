@extends('frontend.layouts.master')
@section('title', 'Register')
@section('styles')
@endsection
@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Register</strong></div>
            </div>
        </div>
    </div>

    <div class="product_section layout_padding">
        <div class="container">
            <div class="col-lg-7 mx-auto">

                <form method="POST" action="{{ route('register') }}" class="card">
                    @csrf
                    <div class="card-body">
                
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                        </div>
                
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                        </div>
                
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                        </div>
                
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mb-3">
                                <div class="form-check">
                                    <input name="terms" id="terms" type="checkbox" class="form-check-input" required />
                                    <label for="terms" class="form-check-label">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}
                                    </label>
                                </div>
                            </div>
                        @endif
                
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
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
