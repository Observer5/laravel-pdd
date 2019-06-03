<?php
namespace Observer\LaravelPdd;

use EasyPdd\Foundation\Application as Pdd;
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
        $this->app->singleton(Pdd::class, function ($laravelApp) {
            $app = new Pdd(config('pdd'));
            return $app;
        });

        $this->app->alias(Pdd::class, 'pdd');
        $this->app->alias(Pdd::class, 'easypdd');
    }
}