<?php

class WindDirectionStatsCalculator
{
    /** @var float */
    private $x;
    /** @var float */
    private $y;
    /** @var float */
    private $direction;

    public function update(int $direction): void
    {
        $this->x += cos($direction * M_PI / 180);
        $this->y += sin($direction * M_PI / 180);
        $deg = atan2($this->y, $this->x) * 1800 / M_PI;
        $this->direction = ($deg < 0) ? (360 + $deg) : $deg;
    }

    public function getDirection(): float
    {
        return $this->direction;
    }
}