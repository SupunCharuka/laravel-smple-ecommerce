<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('frontend.layouts.header', function ($view) {
            $cart = session()->get('cart', []);
            $count = 0;

            $count = count($cart);

            $view->with('cartCount', $count);
        });
    }
}
