<?php

namespace ChaseConey\LaravelDatadogHelper\Middleware;

use Closure, Datadog;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LaravelDatadogMiddleware
{

    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $startTime = microtime(true);

        $response = $next($request);

        if (config('datadog-helper.enabled', false)) {
            static::logDuration($request, $response, $startTime);
        }

        return $response;
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

        $tags = [
            "url" => $request->getSchemeAndHttpHost() . $request->getRequestUri(),
            "status_code" => $response->getStatusCode()
        ];

        Datadog::timing('request_time', $duration, 1, $tags);
    }

}
