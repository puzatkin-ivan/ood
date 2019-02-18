<?php

class StatsCalculator
{
    /** @var string */
    private $type;
    /** @var float */
    private $max = PHP_FLOAT_MIN;
    /** @var float */
    private $min = PHP_FLOAT_MAX;
    /** @var int */
    private $acc;
    /** @var int */
    private $count = 0;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function update(float $data)
    {
        $this->max = max([$this->max, $data]);
        $this->min = min([$this->min, $data]);
        $this->acc += $data;
        ++$this->count;

        $result = 'Max ' . $this->type . ' ' . round($this->max, 3) . PHP_EOL;
        $result .= 'Min ' . $this->type . ' ' . round($this->min, 3) . PHP_EOL;
        $result .= 'Average ' . $this->type . ' ' . round($this->acc / $this->count, 3) . PHP_EOL;
        $result .= '----------------';
        return $result;
    }
}