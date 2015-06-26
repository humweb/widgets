<?php

namespace Humweb\Widgets\Laravel;

use Humweb\Widgets\WidgetFactory;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }


    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     */
    public function register()
    {
        $this->app->singleton('widgets', function() {
            return new WidgetFactory();
        });

        AliasLoader::getInstance()->alias('Widgets', 'Humweb\Widgets\Laravel\WidgetsFacade');
    }
}
