<?php
namespace Observer\LaravelPdd;

use EasyPdd\Foundation\Application as Pdd;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;


class ServiceProvider extends LaravelServiceProvider implements DeferrableProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
        $source = realpath(__DIR__.'/config.php');

        $this->publishes([
            __DIR__ . '/config.php' => config_path('pdd.php')
        ], 'config');

        $this->mergeConfigFrom($source, 'pdd');
    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->app->singleton('EasyPdd', function ($laravelApp) {
            $app = new Pdd(config('pdd'));
            return $app;
        });
    }

    public function provides()
    {
        return ['EasyPdd'];
    }
}
