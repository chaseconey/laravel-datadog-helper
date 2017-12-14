<?php

namespace ChaseConey\LaravelDatadogHelper;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChaseConey\LaravelDatadogHelper
 */
class Datadog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'datadog';
    }
}
