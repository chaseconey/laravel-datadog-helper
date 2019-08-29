<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Datadog Tracking Enabled
    |--------------------------------------------------------------------------
    |
    | Set this option to enable or disable the datadog helper.
    |
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Datadog Tracking Prefix
    |--------------------------------------------------------------------------
    |
    | This is the prefix that will be placed in front of all of your metric entries. If you have multiple
    | applications being tracked in Datadog, it is recommended putting the application name somewhere
    | inside of your prefix. A common naming scheme is something like app.<app-name>.
    |
    */
    'prefix' => null, // metrics prefix

    'api_key' => null,

    'application_key' => null,

    'datadog_host' => 'https://app.datadoghq.com',

    'statsd_server' => 'localhost',

    'statsd_port' => 8125,

    'statsd_socket_path' => null,

    'global_tags' => [],

    'max_buffer_length' => 1,

    /*
    |--------------------------------------------------------------------------
    | Disable tagging request durations with url
    |--------------------------------------------------------------------------
    |
    | Sites with large numbers of unique URIs can cause excessive unique tags for a metric which results
    | in Datadog being unhappy (to the point of being unresponsive).
    |
    */
    'middleware_disable_url_tag' => false,
];
