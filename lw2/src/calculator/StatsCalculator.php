<?php

class StatsCalculator
{
    /** @var string */
    private $type;
    /** @var float */
    private $max = PHP_FLOAT_MIN;
    /** @var float */
    private $min = PHP_FLOAT_MAX;
    /** @var float */
    private $acc;
    /** @var int */
    private $count = 0;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function update(float $data): void
    {
        $this->max = max([$this->max, $data]);
        $this->min = min([$this->min, $data]);
        $this->acc += $data;
        ++$this->count;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getMax(): float
    {
        return $this->max;
    }

    public function getMin(): float
    {
        return $this->min;
    }

    public function getAverage(): float
    {
        return round($this->acc / $this->count, 3);
    }
}