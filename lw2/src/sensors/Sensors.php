<?php

class Sensors
{
    /** @var StatsCalculator */
    public $tempCalculator;
    /** @var StatsCalculator */
    public $humidityCalculator;
    /** @var StatsCalculator */
    public $pressureCalculator;

    public function __construct()
    {
        $this->tempCalculator = new StatsCalculator('Temperature');
        $this->humidityCalculator = new StatsCalculator('Temperature');
        $this->pressureCalculator = new StatsCalculator('Temperature');
    }
}