<?php

namespace ChaseConey\LaravelDatadogHelper;

class LaravelDatadogHelper extends \Datadogstatsd
{

    /**
     * {@inheritdoc}
     */
    public static function send($data, $sampleRate = 1.0, array $tags = null)
    {
        $prefixedData = self::prefixData($data);
        parent::send($prefixedData, $sampleRate, $tags);
    }

    /**
     * Takes normal data array from Datadogstatsd library and adds the Laravel prefix functionality
     *
     * @param $data
     * @return array
     */
    protected static function prefixData($data)
    {
        $prefixedData = array();
        foreach ($data as $stat => $value) {
            $prefixedKey = self::prefix($stat);
            $prefixedData[$prefixedKey] = $value;
        }
        return $prefixedData;
    }

    /**
     * Prefixes a metric name if one is available via config
     *
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
