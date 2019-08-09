<?php

namespace ChaseConey\LaravelDatadogHelper;

use ChaseConey\LaravelDatadogHelper\Datadog\BatchedDogStatsd;
use ChaseConey\LaravelDatadogHelper\Datadog\DogStatsd;
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
        /** @noinspection PhpUndefinedFunctionInspection */
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
        $this->app->singleton('datadog', function () {
            return $this->initDatadog();
        });
    }

    protected function initDatadog()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/datadog-helper.php', 'datadog-helper'
        );

        /** @noinspection PhpUndefinedFunctionInspection */
        $laravelConfig = config('datadog-helper');

        $ddConfig = [
            'host' => $laravelConfig['statsd_server'],
            'port' => $laravelConfig['statsd_port'],
            'datadog_host' => $laravelConfig['datadog_host'],
            'api_key' => $laravelConfig['api_key'],
            'app_key' => $laravelConfig['application_key'],
            'global_tags' => $laravelConfig['global_tags'],
        ];

        $maxBuffer = $laravelConfig['max_buffer_length'];
        if ($maxBuffer > 1) {
            $datadog = new BatchedDogStatsd($ddConfig);
            $datadog::$maxBufferLength = $maxBuffer;
        } else {
            $datadog = new DogStatsd($ddConfig);
        }

        $datadog->setMetricsPrefix($laravelConfig['prefix']);

        return $datadog;
    }
}
