<?php

namespace ChaseConey\LaravelDatadogHelper;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChaseConey\LaravelDatadogHelper
 * @see \Datadog\DogStatsd
 *
 * @method static void timing(string $stat, float $time, float $sampleRate = 1.0, array|string $tags = null)
 * @method static void microtiming(string $stat, float $time, float $sampleRate = 1.0, array|string $tags = null)
 * @method static void gauge(string $stat, float $value, float $sampleRate = 1.0, array|string $tags = null)
 * @method static void histogram(string $stat, float $value, float $sampleRate = 1.0, array|string $tags = null)
 * @method static void distribution(string $stat, float $value, float $sampleRate = 1.0, array|string $tags = null)
 * @method static void set(string $stat, float $value, float $sampleRate = 1.0, array|string $tags = null)
 * @method static void increment(string|array $stats, float $sampleRate = 1.0, array|string $tags = null, int $value = 1)
 * @method static void decrement(string|array $stats, float $sampleRate = 1.0, array|string $tags = null, int $value = -1)
 * @method static void updateStats(string|array $stats, int $delta = 1, float $sampleRate = 1.0, array|string $tags = null)
 * @method static void send(array $data, float $sampleRate = 1.0, array|string $tags = null)
 * @method static void service_check(string $name, int $status, array|string $tags = null, string $hostname = null, string $message = null, int $timestamp = null)
 * @method static void report($udp_message)
 * @method static void flush($udp_message)
 * @method static boolean event(string $title, array $values = [])
 */
class Datadog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'datadog';
    }
}
