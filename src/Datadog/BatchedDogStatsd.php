<?php namespace ChaseConey\LaravelDatadogHelper\Datadog;

class BatchedDogStatsd extends \DataDog\BatchedDogStatsd
{
    use ExtensionTrait;

    public function send($data, $sampleRate = 1.0, $tags = null)
    {
        parent::send($this->wrapSendDataWithMetricPrefix($data), $sampleRate, $tags);
    }
}
