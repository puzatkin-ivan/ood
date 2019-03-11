<?php

class Sensors
{
    /** @var StatsCalculator */
    public $tempCalculator;
    /** @var StatsCalculator */
    public $humidityCalculator;
    /** @var StatsCalculator */
    public $pressureCalculator;
    /** @var StatsCalculator */
    public $windSpeedCalculator;
    /** @var WindDirectionStatsCalculator  */
    public $windDirectionCalculator;

    public function __construct()
    {
        $this->tempCalculator = new StatsCalculator('Temperature');
        $this->humidityCalculator = new StatsCalculator('Humidity');
        $this->pressureCalculator = new StatsCalculator('Pressure');
        $this->windSpeedCalculator = new StatsCalculator('Wind Speed');
        $this->windDirectionCalculator = new WindDirectionStatsCalculator();
    }
}