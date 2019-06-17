<?php

namespace BrunoFernandes\LaravelTwitterHandleValidation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class LaravelTwitterHandleValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Validator::extend('twitter_handle', '\BrunoFernandes\LaravelTwitterHandleValidation\TwitterHandleValidator@validate');
        Validator::replacer( 'twitter_handle', function ($message, $attribute, $rule, $parameters) {
            if ($message == 'validation.twitter_handle') {
                return str_replace(':attribute', $attribute, config('laravel-twitter-handle-validation.validation'));
            }

            return $message;
        });

        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-twitter-handle-validation');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-twitter-handle-validation.php' => config_path('laravel-twitter-handle-validation.php'),
            ], 'config');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-twitter-handle-validation'),
            ], 'lang');*/
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-twitter-handle-validation.php', 'laravel-twitter-handle-validation');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-twitter-handle-validation', function () {
            return resolve(LaravelTwitterHandleValidation::class);
        });
    }
}
