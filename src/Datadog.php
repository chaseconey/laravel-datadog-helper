<?php

namespace ChaseConey\LaravelDatadogHelper;

use Illuminate\Support\Facades\Facade;

class Datadog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'datadog';
    }
}