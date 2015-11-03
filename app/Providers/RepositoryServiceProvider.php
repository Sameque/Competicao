<?php

namespace App\Providers;


use App\CrawlerRepository\ValidateRepository;
use App\CrawlerRepository\ValidateUsers;
use App\CrawlerRepository\ValidateProblem;
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
            return new ValidateRepository();
        });

        $this->app->singleton('ValidateUsers', function(){
            return new ValidateUsers();
        });

        $this->app->singleton('ValidateProblem', function(){
            return new ValidateProblem();
        });

    }
}
