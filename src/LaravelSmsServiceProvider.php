<?php

namespace Mediamaxdk\LaravelSms;

use Illuminate\Support\ServiceProvider;

class LaravelSmsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'mediamaxdk');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'mediamaxdk');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-sms.php', 'laravel-sms');

        // Register the service the package provides.
        $this->app->singleton('laravel-sms', function ($app) {
            return new LaravelSms;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-sms'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-sms.php' => config_path('laravel-sms.php'),
        ], 'laravel-sms.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/mediamaxdk'),
        ], 'laravel-sms.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/mediamaxdk'),
        ], 'laravel-sms.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/mediamaxdk'),
        ], 'laravel-sms.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
