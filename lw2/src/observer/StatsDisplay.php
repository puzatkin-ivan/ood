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
        $this->tempCalculator->calculate($observable->getTemperature());
        $this->humidityCalculator->calculate($observable->getHumidity());
        $this->pressureCalculator->calculate($observable->getPressure());
        echo $this->tempCalculator->printData() . PHP_EOL;
        echo $this->humidityCalculator->printData() . PHP_EOL;
        echo $this->pressureCalculator->printData() . PHP_EOL;
    }
}