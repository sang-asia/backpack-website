<?php

namespace Web\BE;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::componentNamespace('Web\\BE\\View\\Components', 'web-be');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'web_be');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'web_be');

        app()->config['filesystems.links'] = app()->config['filesystems.links'] + [
                public_path('backend') => __DIR__ . '/../public',
            ];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
