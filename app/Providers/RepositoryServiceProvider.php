<?php

namespace App\Providers;


use App\Libraries\CrawlerRepository\ValidateRepository;
use App\Libraries\CrawlerRepository\ValidateUsers;
use App\Libraries\CrawlerRepository\ValidateProblem;
use Illuminate\Support\ServiceProvider;
// Error in add problems (RepositoryServiceProvider)
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
