<?php
namespace Observer\LaravelPdd;

use EasyPdd\Foundation\Application as PddApplication;
use Illuminate\Contracts\Support\DeferrableProvider;
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
        $accounts = config('pdd.application');
        foreach ($accounts as $account => $config) {
            $this->app->bind("pdd.application.{$account}", function ($laravelApp) use ( $account, $config) {
                return new PddApplication(array_merge(config('pdd.defaults', []), $config));
            });
        }

        $this->app->alias("pdd.application.default", 'pdd.application');
        $this->app->alias("pdd.application.default", 'easypdd.application');
    }

}
