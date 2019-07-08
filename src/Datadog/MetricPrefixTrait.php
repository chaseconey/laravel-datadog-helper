<?php namespace ChaseConey\LaravelDatadogHelper\Datadog;

trait MetricPrefixTrait
{
    protected $metricsPrefix;

    public function setMetricsPrefix($metricsPrefix)
    {
        $this->metricsPrefix = $metricsPrefix;
    }

    protected function wrapSendDataWithMetricPrefix($data)
    {
        if(!$this->metricsPrefix) {
            return $data;
        }

        $wrapped = [];
        foreach($data as $metric => $stat) {
            $wrapped[$this->metricsPrefix] = $stat;
        }
        return $wrapped;
    }
}
