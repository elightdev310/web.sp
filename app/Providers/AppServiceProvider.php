<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

use App\SP\Libs\UserLib;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function($view){
            $currentUser = \Auth::user();

            $view->with('currentUser', $currentUser);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('spuser', function ($app) {
            return new UserLib($app);
        });

        //
        $loader = AliasLoader::getInstance();
        $loader->alias('SPHelper', \App\SP\Helpers\SPHelper::class);
        
        $loader->alias('SPUserLib', \App\SP\Facades\UserFacade::class);
    }
}
