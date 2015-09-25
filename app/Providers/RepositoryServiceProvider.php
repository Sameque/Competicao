<?php

namespace App\Providers;


use App\CrawlerRepository\ValidateUsers;
use App\User;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ValidateRepository', function(){
            return new ValidateUsers();
        });
    }
}