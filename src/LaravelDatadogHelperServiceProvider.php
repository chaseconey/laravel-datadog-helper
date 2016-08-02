<?php

namespace ChaseConey\LaravelDatadogHelper;

use Illuminate\Support\ServiceProvider;

class LaravelDatadogHelperServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes(
            [
                __DIR__ . '/../config/datadog-helper.php' => config_path('datadog-helper.php'),
            ]
        );

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/datadog-helper.php', 'datadog-helper'
        );

        $this->app->bind('datadog', \Datadogstatsd::class);
    }
}