<?php

namespace ChaseConey\LaravelDatadogHelper;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LaravelDatadogHelper
{

    /**
     * @param Request $request
     * @param Response $response
     * @param double $startTime
     */
    public static function handle(Request $request, Response $response, $startTime)
    {
        static::logDuration($request, $response, $startTime);
    }

    /**
     * Logs the duration of a specific request through the application
     *
     * @param Request $request
     * @param Response $response
     * @param double $startTime
     */
    protected static function logDuration(Request $request, Response $response, $startTime)
    {
        $duration = microtime(true) - $startTime;
        $metric = self::prefix('request_time');

        $tags = [
            "url" => $request->getSchemeAndHttpHost() . $request->getRequestUri(),
            "status_code" => $response->getStatusCode()
        ];

        Datadog::timing($metric, $duration, 1, $tags);
    }

    /**
     * @return string
     */
    protected static function prefix($metric)
    {
        $prefix = config('datadog-helper.prefix');

        if (!$prefix) {
            return $metric;
        }

        return "{$prefix}.{$metric}";
    }
}
