<?php

namespace ChaseConey\LaravelDatadogHelper\Middleware;

use ChaseConey\LaravelDatadogHelper\LaravelDatadogHelper;
use Closure;

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
            LaravelDatadogHelper::handle($request, $response, $startTime);
        }

        return $response;
    }
}
