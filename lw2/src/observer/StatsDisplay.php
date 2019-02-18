<?php

class StatsDisplay implements ObserverInterface
{
    /** @var StatsCalculator */
    private $tempCalculator;
    /** @var StatsCalculator */
    private $humidityCalculator;
    /** @var StatsCalculator */
    private $pressureCalculator;

    public function __construct()
    {
        $this->tempCalculator = new StatsCalculator('Temperature');
        $this->humidityCalculator = new StatsCalculator('Humidity');
        $this->pressureCalculator = new StatsCalculator('Pressure');
    }

    /**
     * @param ObservableInterface|WeatherData $observable
     */
    public function update(ObservableInterface $observable): void
    {
        echo $this->tempCalculator->update($observable->getTemperature()) . PHP_EOL;
        echo $this->humidityCalculator->update($observable->getHumidity()) . PHP_EOL;
        echo $this->pressureCalculator->update($observable->getPressure()) . PHP_EOL;
    }
}