<?php

namespace App\Providers;

use App\Libraries\CrawlerRepository\ValidateUsers;
use App\User;
use Illuminate\Support\Facades\App;
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

        //REPOSITORYS
        Validator::extend('userspoj', function ($attribute, $value, $parameters) {
            $validateUser = App::make('ValidateUsers');
            $validation = $validateUser->validate('spoj',$value);
            return $validation;
        });


        Validator::extend('useruri', function ($attribute, $value, $parameters) {
//            dd('AppServiceProvider >> boot',$value);
            $validateUser = App::make('ValidateUsers');
            $validation = $validateUser->validate('uri',$value);
            return $validation;

        });

        Validator::extend('useruva', function ($attribute, $value, $parameters) {
            $validateUser = App::make('ValidateUsers');
            $validation = $validateUser->validate('uva',$value);
            return $validation;
        });


        //PROBLEMS
        Validator::extend('problemspoj', function ($attribute, $value, $parameters) {
            $validateProblem = App::make('ValidateProblem');
            return $validateProblem->validate('spoj',$value);
        });


        Validator::extend('problemuri', function ($attribute, $value, $parameters) {
            $validateProblem = App::make('ValidateProblem');
//            dd('AppServiceProvider > boot 1',$value);

            return $validateProblem->validate('uri',$value);
        });

        Validator::extend('problemuva', function ($attribute, $value, $parameters) {
            $validateProblem = App::make('ValidateProblem');
            return $validateProblem->validate('uva',$value);
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
