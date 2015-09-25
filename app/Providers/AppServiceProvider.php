<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('urlvalid', function ($attribute, $value, $parameters) {
            $value = $this->formatUrl($value);
            return checkdnsrr($value);
        });
    }

    public function formatUrl($url)
    {
        if (substr($url, -1) == '/') {
            $url = substr($url, 0, -1);
        }

        if (strripos($url, 'https') === 0) {
            $url = substr($url, 8, strlen($url) - 8);
        } elseif (strripos($url, 'http') === 0) {
            $url = substr($url, 7, strlen($url) - 7);
        }
        return $url;
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
