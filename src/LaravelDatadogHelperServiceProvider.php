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

        \Datadogstatsd::configure(
            config('datadog-helper.api_key'),
            config('datadog-helper.application_key'),
            config('datadog-helper.datadog_host'),
            'TCP',
            config('datadog-helper.statsd_server'),
            config('datadog-helper.statsd_port')
        );

        $this->app->singleton('datadog', \Datadogstatsd::class);
    }
}