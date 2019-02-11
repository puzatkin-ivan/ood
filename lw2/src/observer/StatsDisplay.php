<?php

class StatsDisplay implements ObserverInterface
{
    /** @var string */
    private $type;
    /** @var float */
    private $min = PHP_FLOAT_MAX;
    /** @var float */
    private $max = PHP_FLOAT_MIN;
    /** @var int */
    private $acc = 0;
    /** @var int */
    private $count = 0;
    /** @var callable */
    private $getInformationFromDetector;

    public function __construct(string $type, callable $getInformationFromDetector)
    {
        $this->getInformationFromDetector = $getInformationFromDetector;
        $this->type = $type;
    }

    public function update(WeatherInfo $info): void
    {
        $this->updateInformation($info);
        echo (string)$this;
    }

    public function __toString(): string
    {
        $result = 'Max ' . $this->type . ' ' . round($this->max, 3) . PHP_EOL;
        $result .= 'Min ' . $this->type . ' ' . round($this->min, 3) . PHP_EOL;
        $result .= 'Average ' . $this->type . ' ' . round($this->acc / $this->count, 3) . PHP_EOL;
        $result .= '----------------' . PHP_EOL;
        return $result;
    }

    private function updateInformation(WeatherInfo $info): void
    {
        $data = call_user_func($this->getInformationFromDetector, $info);
        $this->max = max([$this->max, $data]);
        $this->min = min([$this->min, $data]);
        $this->acc += $data;
        ++$this->count;
    }
}