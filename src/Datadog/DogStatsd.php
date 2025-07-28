<?php namespace ChaseConey\LaravelDatadogHelper\Datadog;

class DogStatsd extends \DataDog\DogStatsd
{
    use ExtensionTrait;

    public function send($data, $sampleRate = 1.0, $tags = null, $cardinality = null)
    {
        parent::send($this->wrapSendDataWithMetricPrefix($data), $sampleRate, $tags, $cardinality);
    }
}
