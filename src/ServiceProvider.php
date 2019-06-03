<?php
namespace Observer\LaravelPdd;

use EasyPdd\Foundation\Application;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;


class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
        $source = realpath(__DIR__.'/config.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('pdd.php')], 'laravel-pdd');
        }

        $this->mergeConfigFrom($source, 'pdd');
    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->app->singleton('easy.pdd', function ($laravelApp) {
            $app = new Application(config('pdd'));
            return $app;
        });

    }
}