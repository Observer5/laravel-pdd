<?php
namespace Observer\LaravelPdd;

use EasyPdd\Foundation\Application;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;


class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {

    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->app->singleton(Application::class, function ($laravelApp) {
            $app = new Application(config('pdd'));
            return $app;
        });

    }
}